<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Project;
use App\Models\Photos;
use App\Models\Material;
use App\Models\Services;
use App\Models\Roof;
use App\Models\Attachment;
use App\Models\Portfolio;
use App\Models\ServiceCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public $maxFolders = 20;
    public $dir = 'articles/';
    public $projectsDir = 'projects/';
    public $portfolioDir = 'portfolio/';

    public function articles() {
        $articles = Article::all();
        return view('admin.articles.list', compact('articles'));
    }

    public function createArticle(Request $request) {
        if($request->post()) { # Создание статьи
            $slug = Str::slug($request->title);
            $request->merge([
                'slug' => $slug,
            ]);

            $request->validate([ # Валидация данных
                'title' => 'required',
                'img' => 'required',
                'seo_description' => 'required',
                'description' => 'required',
                'body' => 'required',
                'slug' => 'unique:articles,slug'
            ], [
                'title.required' => 'Заголовок отсутсвует',
                'img.required' => 'Обложка не загружена',
                'seo_description.required' => 'SEO описание отсутсвует',
                'description.required' => 'Описание отсутсвует',
                'body.required' => 'Основной контент отсутсвует',
                'slug.unique' => 'Такой заголовок уже существует'
            ]);

            $article = Article::create([
                'slug' => Str::slug($request->title),
                'title' => $request->title,
                'seo' => $request->seo_description,
                'description' => $request->description,
                'content' => $request->body,
                'img' => 'gg.jpg'
            ]);

            $files = Storage::directories($this->dir); # Определяем директорию папки
            foreach ($files as $file) {
                $dirNumber = str_replace($this->dir,'', $file);
                $directories[] = $dirNumber;
            }
            sort($directories);
            $lastDir = $this->dir . end($directories); # Берём последнюю папку
            $countDirectories = count(Storage::directories($lastDir)); # Проверяем количество директорий в папке
            $folder = end($directories); # Номер общей папки

            if(!File::exists("storage/$this->dir/". $folder . '/' . $article->id)) { # Проверить - если папка не существует - то создать.
                if ($countDirectories >= $this->maxFolders) {
                    $folder = (int) end($directories) + 1; # Создаём новую папку
                    $newDir = "storage/$this->dir/" . $folder;
                    File::makeDirectory($newDir);
                    File::makeDirectory($newDir . '/' . $article->id); # А в ней ещё одну папку с id статьи
                } else {
                    File::makeDirectory("storage/$this->dir/" . $folder . '/' . $article->id); # А если нет перегрузки файлов, то проверяем есть ли уже папка с id
                }
            }

            $path = "$this->dir" . "$folder/$article->id";
            $article->img = str_replace("articles/$folder/$article->id/", '', $request->file('img')->store($path));
            $article->folder = $folder;

            $files = Storage::files('attachments');
            foreach($files as $item) {
                $newFileName = substr($item, strrpos($item, '/') + 1);
                $newPath = "/storage/articles/$folder/$article->id/$newFileName";
                $article->content = str_replace($item, $newPath, $article->content);

                Attachment::where('link', '/storage/' . $item)->update([
                    'link' => $newPath,
                    'article_id' => $article->id
                ]);
                Storage::move($item, $newPath);
            }

            $article->save();

            return redirect(route('articles.detail', ['slug' => $slug]));
        }

        return view('admin.articles.create');
    }

    public function updateArticle(Request $request, $id) {
        $article = Article::find($id);

        if($request->post()) {
            $request->validate([ # Валидация данных
                'title' => 'required',
                'seo_description' => 'required',
                'description' => 'required',
                'body' => 'required',
            ], [
                'title.required' => 'Заголовок отсутсвует',
                'seo_description.required' => 'SEO описание отсутсвует',
                'description.required' => 'Описание отсутсвует',
                'body.required' => 'Основной контент отсутсвует',
            ]);

            $article->title = $request->title;
            $article->seo = $request->seo_description;
            $article->description = $request->description;
            $article->content = $request->body;

            if($request->file('img')) { # Меняем обложку
                $path = "$this->dir" . "$article->folder/$article->id";
                $article->img = str_replace("articles/$article->folder/$article->id/", '', $request->file('img')->store($path));
            }

            $article->update();

            return redirect()->back();
        } else {
            return view('admin.articles.update', compact('article'));
        }
    }

    public function deleteArticle($id) {
        Attachment::where('article_id', $id)->delete();
        Article::find($id)->delete();
        return redirect(route('admin.articles.page'));
    }

    # Загрузка картинки в textarea ( TinyMCE )
    public function upload(Request $request){
        # Должно загружать в папку с id статьи
        $fileName = rand(0, 100000000) . $request->file('file')->getClientOriginalName();
        $path = $request->file('file')->storeAs('/attachments', $fileName);

        Attachment::create([
            'link' => '/storage/attachments/' . $fileName,
            'article_id' => null,
        ]);

        return response()->json(['location'=>"/storage/$path"]);
    }

    public function uploadEdit(Request $request, $id) {
        $article = Article::find($id);
        $fileName = rand(0, 100000000) . $request->file('file')->getClientOriginalName();
        $dir = '/articles/' . $article->folder . '/' . $article->id . '/';
        $path = $request->file('file')->storeAs($dir, $fileName);

        Attachment::create([
            'link' => '/storage' . $dir . $fileName,
            'article_id' => $article->id,
        ]);

        return response()->json(['location' => "/storage" . $dir . $fileName]);
    }

    public function projects() {
        $projects = Project::all();
        return view('admin.projects.list', compact('projects'));
    }

    public function createProject(Request $request) {
        $materials = Material::all();
        $roofs = Roof::all();

        if($request->post()) {
            $request->validate([ # Валидация данных
                'price' => 'required|integer',
                'roof' => 'required|integer',
                'material' => 'required|integer',
                'floors' => 'required',
                'square' => 'required',
                'power' => 'required',
                'description' => 'required',
            ], [
                'price.required' => 'Ценник отсутсвует',
                'price.integer' => 'Ценник должен быть целым числом',
                'material.required' => 'Материал не указан',
                'material.integer' => 'Материал должен быть целым числом',
                'roof.required' => 'Тип крыши не указан',
                'roof.integer' => 'Тип крыши должен быть целым числом',
                'floors.required' => 'Этажность не указана',
                'square.required' => 'Квадратура дома не указана',
                'power.required' => 'Потребляемая мощность не указана',
                'description.required' => 'Описание отсутсвует',
            ]);

            $project = Project::create([
                'price' => $request->price,
                'term' => $request->term,
                'material' => $request->material,
                'roof' => $request->roof,
                'floors' => $request->floors,
                'square' => $request->square,
                'power' => $request->power,
                'description' => $request->description,
            ]);

            if($request->file('poster')) { # Меняем обложку
                $path = "$this->projectsDir" . "$project->id";
                $project->img = '/storage/' . $request->file('poster')->store($path);
            }

            if($request->file('photos')) { # Сохраняем картинки
                $path = "$this->projectsDir" . "$project->id";
                $photos = [];
                foreach($request->file('photos') as $key => $photo) {
                    $photos[$key]['project_id'] = $project->id;
                    $photos[$key]['src'] = '/storage/' . $photo->store($path);
                }
                Photos::where('project_id', $project->id)->delete();
                Photos::insert($photos);
            }

            $project->update();

            return redirect()->back();
        } else {
            return view('admin.projects.create', compact('materials', 'roofs'));
        }
    }

    public function updateProject(Request $request, $id) {
        $project = Project::find($id);
        $materials = Material::all();
        $roofs = Roof::all();

        if($request->post()) {
            $request->validate([ # Валидация данных
                'price' => 'required|integer',
                'roof' => 'required|integer',
                'material' => 'required|integer',
                'floors' => 'required',
                'square' => 'required',
                'power' => 'required',
                'description' => 'required',
            ], [
                'price.required' => 'Ценник отсутсвует',
                'price.integer' => 'Ценник должен быть целым числом',
                'material.required' => 'Материал не указан',
                'material.integer' => 'Материал должен быть целым числом',
                'roof.required' => 'Тип крыши не указан',
                'roof.integer' => 'Тип крыши должен быть целым числом',
                'floors.required' => 'Этажность не указана',
                'square.required' => 'Квадратура дома не указана',
                'power.required' => 'Потребляемая мощность не указана',
                'description.required' => 'Описание отсутсвует',
            ]);

            $project->price = $request->price;
            $project->term = $request->term;
            $project->material = $request->material;
            $project->roof = $request->roof;
            $project->floors = $request->floors;
            $project->square = $request->square;
            $project->power = $request->power;
            $project->description = $request->description;

            if($request->file('poster')) { # Меняем обложку
                $path = "$this->projectsDir" . "$project->id";
                $project->img = '/storage/' . $request->file('poster')->store($path);
            }

            if($request->file('photos')) { # Сохраняем картинки
                $path = "$this->projectsDir" . "$project->id";
                $photos = [];
                foreach($request->file('photos') as $key => $photo) {
                    $photos[$key]['project_id'] = $project->id;
                    $photos[$key]['src'] = '/storage/' . $photo->store($path);
                }
                Photos::where('project_id', $project->id)->delete();
                Photos::insert($photos);
            }

            $project->update();

            return redirect()->back();
        } else {
            return view('admin.projects.update', compact('project', 'materials', 'roofs'));
        }
    }

    public function deleteProject(Request $request, $id) {
        Project::find($id)->delete();
        return redirect(route('admin.projects.page'));
    }

    public function services() {
        $categories = ServiceCategory::all();
        $types = DB::table('services_types')->get();

        return view('admin.services.list', compact('categories', 'types'));
    }

    public function serviceCreate(Request $request) {
        Services::create([
            'name' => $request->title,
            'category_id' => $request->category_id,
            'type_id' => $request->type_id,
            'price' => $request->price ? $request->price : 0,
        ]);
        return redirect()->back();
    }

    public function serviceDelete() {
        return 'Удалить услугу';
    }

    public function portfolio() {
        $portfolio = Portfolio::all();

        return view('admin.portfolio.list', compact('portfolio'));
    }

    public function portfolioCreate(Request $request) {
        $portfolio = Portfolio::all();

        // title img photos completed type
        if($request->post()) {
            // dd($request->photos);
            $request->validate([ # Валидация данных
                'title' => 'required',
                'img' => 'required|file',
                'completed' => 'required',
                'description' => 'required',
                'type' => 'required',
            ], [
                'title.required' => 'Название отсутствует отсутсвует',
                'img.file' => 'Должен быть файлом',
                'img.required' => 'Облажка отсутствует',
                'completed.required' => 'Дата не указана',
                'description.required' => 'Описание отсутствует',
            ]);

            $portfolio = Portfolio::create([
                'name' => $request->title,
                'img' => 'test',
                'description' => $request->description,
                'completed' => $request->completed,
                'type_id' => $request->type
            ]);

            if($request->file('img')) { # Меняем обложку
                $path = "$this->portfolioDir" . "$portfolio->id";
                $portfolio->img = '/storage/' . $request->file('img')->store($path);
            }

            if($request->file('photos')) { # Сохраняем картинки
                $path = "$this->portfolioDir" . "$portfolio->id";
                $photos = [];
                foreach($request->file('photos') as $key => $photo) {
                    $photos[$key]['portfolio_id'] = $portfolio->id;
                    $photos[$key]['src'] = '/storage/' . $photo->store($path);
                }
                DB::table('portfolio_photos')->where('portfolio_id', $portfolio->id)->delete();
                DB::table('portfolio_photos')->insert($photos);
            }

            $portfolio->update();

            return redirect()->back();
        } else {
            $types = DB::table('portfolio_types')->get();
            return view('admin.portfolio.create', compact('types'));
        }
    }

    public function portfolioEdit(Request $request, $item_id) {
        $item = Portfolio::find($item_id);

        if($request->post()) {
//            $request->validate([ // Валидация данных
//                'title' => 'required',
//                'img' => 'required|file',
//                'completed' => 'required',
//                'description' => 'required',
//                'type' => 'required',
//            ], [
//                'title.required' => 'Название отсутствует отсутсвует',
//                'img.file' => 'Должен быть файлом',
//                'img.required' => 'Облажка отсутствует',
//                'completed.required' => 'Дата не указана',
//                'completed.required' => 'Описание отсутствует',
//            ]);
//
//            $portfolio = Portfolio::create([
//                'name' => $request->title,
//                'img' => 'test',
//                'description' => $request->description,
//                'completed' => $request->completed,
//                'type_id' => $request->type
//            ]);
//
            if($request->file('img')) { // Меняем обложку
                $path = "$this->portfolioDir" . "$item->id";
                $item->img = '/storage/' . $request->file('img')->store($path);
            }
//
            if($request->file('photos')) { // Сохраняем картинки
                $path = "$this->portfolioDir" . "$item->id";
                $photos = [];
                foreach($request->file('photos') as $key => $photo) {
                    $photos[$key]['portfolio_id'] = $item->id;
                    $photos[$key]['src'] = '/storage/' . $photo->store($path);
                }
                DB::table('portfolio_photos')
                    ->where('portfolio_id', $item->id)
                    ->delete();
                DB::table('portfolio_photos')
                    ->insert($photos);
            }

            $item->update();

            return redirect()->back();
        } else {
            $types = DB::table('portfolio_types')->get();
            return view('admin.portfolio.edit', compact('item', 'types'));
        }
    }

    public function telegramArticlesList() {
        $articles = DB::table('telegram_articles')->get();
        return view('admin.telegram.articles', compact('articles'));
    }

    public function telegramArticlesCreate(Request $request) {
        if($request->post()) {
            $token = env('BOOK_BOT_TOKEN');

            # Замените на ваш идентификатор канала
            $channel_id = env('TELEGRAM_CHANNEL_ID');

            # Сообщение, которое вы хотите отправить
            $message = str_replace('<br>', "\n", str_replace('&nbsp;', "",str_replace('&ndash;', '-', strip_tags($request->content, '<strong></strong><b></b><i></i><em></em><a></a><pre></pre><u></u>'))));
            // dump($request->content);
            // dd($message);

            # URL для отправки запроса
            $url = "https://api.telegram.org/bot$token/sendMessage";
            $keyboard = [
                'inline_keyboard' => [
                    [
                        ['text' => 'Domovkin.ru - ремонт и строительство', 'url' => env('SITE_URL')],
                    ]
                ],
            ];
            $encodedKeyboard = json_encode($keyboard);

            # Данные, которые будут отправлены в POST-запросе
            $data = [
                'chat_id' => $channel_id,
                'text' => $message,
                'parse_mode' => 'HTML',
                'reply_markup' => $encodedKeyboard,
            ];

            # Использование cURL для отправки POST-запроса
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($ch);
            curl_close($ch);

            DB::table('telegram_articles')->insert([
                'message_id' => json_decode($response)->result->message_id,
                'content_tinymce' => $request->content,
                'content_telegram' => $message,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            return dd($response);
        }

        return view('admin.telegram.create');
    }
}
