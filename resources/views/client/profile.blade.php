<a href="/">На главную</a>
<h1>Вы авторизованы</h1>

@role('admin')
<ul>
    <li><a>Проекты</a></li>
    <li><a href="{{ route('admin.articles.page') }}">Статьи</a></li>
</ul>
@endrole

@role('editor')
<ul>
    <li><a href="{{ route('admin.articles.page') }}">Статьи</a></li>
</ul>
@endrole
