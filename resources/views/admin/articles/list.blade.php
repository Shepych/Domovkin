<h1>Список статей</h1>

<label>
    <a style="display: inline-block;margin-bottom: 30px" href="{{ route('admin.articles.method.create') }}">
    <button style="width: 300px;height: 100px;">Создать статью</button>
    </a>
</label>

@foreach($articles as $article)
    <div>
        Статья
        <button>Изменить</button>
        <button>Удалить</button>
    </div>
@endforeach
