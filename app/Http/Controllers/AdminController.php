<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public $maxFolders = 3;
    public $dir = 'articles/';

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
}
