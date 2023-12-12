<h1>Список статей</h1>

<label>
    <a style="display: inline-block;margin-bottom: 30px" href="{{ route('admin.articles.method.create') }}">
    <button style="width: 300px;height: 100px;">Создать статью</button>
    </a>
</label>

@foreach($articles as $article)
    <div>
        Статья 
        {{-- <img src="{{ $article->poster() }}" alt=""> --}}
        <a style="display: inline-block;" href="{{ route('admin.articles.page.update', ['id' => $article->id]) }}">
            <button>Изменить</button>
        </a>
        <a style="display: inline-block;" onclick="return confirm('Are you sure?')" href="{{ route('admin.articles.method.delete', ['id' => $article->id]) }}">
            <button>Удалить</button>
        </a>
    </div>
@endforeach
