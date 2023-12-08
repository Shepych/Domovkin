<?php

namespace App\Http\Controllers;

use App\Models\Article;
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
            # Валидация данных

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

            # Загрузить обложку
            File::put("storage/$this->dir" . "$folder/$article->id", $request->file('img'));
            return redirect()->back()
                ->withInput();
        }

        return view('admin.articles.create');
    }

    public function editArticle() {
        return 'Редактировать статью';
    }

    public function deleteArticle() {
        return 'Удалить статью';
    }
}
