<a href="/">На главную</a>
<h1>Вы авторизованы</h1>
<a href="{{ route('client.logout') }}">Выход</a>

@role('admin')
    <ul>
        <li><a href="{{ route('admin.projects.page') }}">Проекты</a></li>
        <li><a href="{{ route('admin.articles.page') }}">Статьи</a></li>
        <li><a href="{{ route('admin.services.list') }}">Услуги</a></li>
        <li><a href="{{ route('admin.portfolio.list') }}">Портфолио</a></li>
        <li><a href="{{ route('admin.telegram.articles') }}">Телеграм</a></li>
    </ul>
@endrole

@role('editor')
    <ul>
        <li><a href="{{ route('admin.articles.page') }}">Статьи</a></li>
    </ul>
@endrole
