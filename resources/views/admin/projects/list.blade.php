<h1>Список проектов</h1>

<label>
    <a style="display: inline-block;margin-bottom: 30px" href="{{ route('admin.projects.method.create') }}">
    <button style="width: 300px;height: 100px;">Создать проект</button>
    </a>
</label>

@foreach($projects as $project)
    <div>
        Проект
        {{-- <img src="{{ $article->poster() }}" alt=""> --}}
        <a style="display: inline-block;" href="{{ route('admin.projects.page.update', ['id' => $project->id]) }}">
            <button>Изменить</button>
        </a>
        <a style="display: inline-block;" onclick="return confirm('Are you sure?')" href="{{ route('admin.projects.method.delete', ['id' => $project->id]) }}">
            <button>Удалить</button>
        </a>
    </div>
@endforeach
