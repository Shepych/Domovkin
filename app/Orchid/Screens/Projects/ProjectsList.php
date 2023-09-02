<?php

namespace App\Orchid\Screens\Projects;

use App\Models\Project;
use App\Orchid\Layouts\Projects\ProjectsListTable;
use Orchid\Screen\Screen;

class ProjectsList extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'projects' => Project::paginate(5)
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Объекты';
    }

    public $description = 'Готовые проекты домов';

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            # Кнопка "Создать объект"
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
            ProjectsListTable::class
        ];
    }
}
