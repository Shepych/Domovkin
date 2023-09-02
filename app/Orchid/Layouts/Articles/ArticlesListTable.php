<?php

namespace App\Orchid\Layouts\Articles;

use App\Models\Article;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class ArticlesListTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'articles';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('img', 'Обложка')->render(function (Article $article) {
                # Делаем запрос на привязанные аттачменты Orchid'а
                $poster = $article->attachment()->first();
                $src = $poster ? '/storage/' . $poster->path . $poster->name . '.' . $poster->extension : null;
                return "<img width='160px' src='$src'>";
            })->popover('Обложка статьи'),
            TD::make('title', 'Заголовок')->sort()->filter(TD::FILTER_TEXT),
            TD::make('description', 'Описание')
                ->width(300),
            TD::make('action', '')->render(function (Article $article) {
               return ModalToggle::make('Редактировать')
                   ->modal('editArticle')
                   ->method('update')
                   ->modalTitle('Редактирование статьи')
                   ->asyncParameters([
                       'article' => $article
                   ]);
            })->width(100),

            TD::make('action', '')->render(function (Article $article) {
                return Button::make('Удалить')
                    ->confirm('Точно удалить ?')
                    ->method('delete')
                    ->parameters([
                        'id' => $article->id
                    ]);
            })->width(60)
        ];
    }
}
