<?php

namespace App\Orchid\Layouts\Projects;

use App\Models\Article;
use App\Models\Project;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class ProjectsListTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'projects';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('img', 'Обложка')->render(function (Project $project) {
                # Делаем запрос на привязанные аттачменты Orchid'а
//                $poster = $project->attachment()->first();
//                $src = $poster ? '/storage/' . $poster->path . $poster->name . '.' . $poster->extension : null;
                return "<img width='160px' src=''>";
            }),
            TD::make('name', 'Проект'),

//            TD::make('action', '')->render(function (Article $article) {
//                return ModalToggle::make('Редактировать')
//                    ->modal('editArticle')
//                    ->method('update')
//                    ->modalTitle('Редактирование статьи')
//                    ->asyncParameters([
//                        'article' => $article
//                    ]);
//            })->width(100),
//
//            TD::make('action', '')->render(function (Article $article) {
//                return Button::make('Удалить')
//                    ->confirm('Точно удалить ?')
//                    ->method('delete')
//                    ->style('background-color:#e45847;color:white')
//                    ->parameters([
//                        'id' => $article->id
//                    ]);
//            })->width(60)
        ];
    }
}
