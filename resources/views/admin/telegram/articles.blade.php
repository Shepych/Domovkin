<h1>Список статей телеграм канала</h1>

<label>
    <a style="display: inline-block;margin-bottom: 30px" href="{{ route('admin.telegram.articles.create') }}">
        <button style="width: 300px;height: 100px;">Создать статью</button>
    </a>
</label>

@foreach($articles as $article)
    <div style="margin-bottom:20px">
        Статья {{ $article->id }}
        {{-- <a style="display: inline-block;" href="{{ route('admin.telegram.article.update', ['id' => $article->id]) }}">
            <button>Изменить</button>
        </a>
        <a style="display: inline-block;" onclick="return confirm('Are you sure?')" href="{{ route('admin.telegram.article.delete', ['id' => $article->id]) }}">
            <button>Удалить</button>
        </a> --}}
    </div>
@endforeach