<?php

namespace App\Orchid\Screens\Articles;

use App\Orchid\Layouts\Articles\ArticlesListTable;
use Illuminate\Support\Str;
use Orchid\Attachment\Attachable;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\SimpleMDE;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Layouts\Modal;
use Orchid\Screen\Screen;
use App\Models\Article;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;
use Illuminate\Http\Request;

class ArticlesList extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public $description = 'описание';
    public function query(): iterable
    {
        return [
            'articles' => Article::filters()->paginate(3)
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Статьи';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Создать статью')->modal('createArticle')->method('create'),
//            ModalToggle::make('Редактировать статью')->modal('editArticle')->method('edit')
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            # Список статей
            ArticlesListTable::class,

            # Создание статьи
            Layout::modal('createArticle', Layout::rows([
                Input::make('title')->title('Заголовок')->placeholder('Введите текст'),
                Input::make('description')->title('Описание')->placeholder('Введите текст'),
                SimpleMDE::make('content')
                ->dir('public'),
                Picture::make('poster')
                    ->groups('poster')
                    ->maxFiles(1)
                    ->storage('public'),
            ]))
                ->title('Создать статью')
                ->size(Modal::SIZE_LG)
                ->applyButton('Создать'),

            # Редактирование статьи
            Layout::modal('editArticle', Layout::rows([
                Input::make('article.id')->hidden(),
                Input::make('article.title')
                    ->required()
                    ->title('Заголовок')
                    ->placeholder('Заголовок'),
                TextArea::make('article.description')
                    ->required()
                    ->style('height:300px')
                    ->title('Описание')
                    ->placeholder('Описание'),
                SimpleMDE::make('article.content'),
                Upload::make('article.attachment')
                    ->groups('poster')
                    ->maxFiles(1)
                    ->storage('public'),
            ]))
                ->async('asyncGetArticle')
                ->size(Modal::SIZE_LG),
        ];
    }

    public function asyncGetArticle($article): array {
        $asyncArticle = Article::find($article['id']);
        $asyncArticle->load('attachment');
        return [
            'article' => $asyncArticle
        ];
    }

    public function create(Request $request) {
        $article = Article::create([
            'title' => $request->input('title'),
            'slug' => Str::slug($request->input('title')),
            'description' => $request->input('description'),
            'img' => '',
            'content' => $request->input('content'),
        ]);
        $article->attachment()->syncWithoutDetaching(
            $request->input('poster', [])
        );
        Toast::info('Статья добавлена');
    }

    public function update(Request $request) {
        $article = Article::find($request->article['id']);
        $article->update([
            'title' => $request->article['title'],
            'description' => $request->article['description'],
            'content' => $request->article['content']
        ]);
        $article->attachment()->syncWithoutDetaching(
            $request->input('article.attachment', [])
        );
        Toast::success('Сохранено');
    }

    public function delete(Request $request) {
        Article::find($request->id)->delete();
        Toast::success('Удалено');
    }
}
