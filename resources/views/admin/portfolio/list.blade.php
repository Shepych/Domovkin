<h1>Портфолио список</h1>

<label>
    <a style="display: inline-block;margin-bottom: 30px" href="{{ route('admin.portfolio.method.create') }}">
    <button style="width: 300px;height: 100px;">Добавить работу</button>
    </a>
</label>

@foreach($portfolio as $project)
    <div>
        {{ $project->name }}
        {{-- <img src="{{ $article->poster() }}" alt=""> --}}
        {{-- <a style="display: inline-block;" href="{{ route('admin.portfolio.page.update', $project->id) }}">
            <button>Изменить</button>
        </a> --}}
        {{-- <a style="display: inline-block;" onclick="return confirm('Are you sure?')" href="{{ route('admin.articles.method.delete', ['id' => $article->id]) }}">
            <button>Удалить</button>
        </a> --}}
    </div>
@endforeach
