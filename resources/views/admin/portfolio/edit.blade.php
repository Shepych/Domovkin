<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Изменить проект портфолио</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.portfolio.method.edit') }}" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" placeholder="Заголовок" value="{{ $item->name }}"><br>
        <label>
            <img src="{{ $item->img }}" alt="Главная обложка">
            <input type="file" name="img" value="{{ $item->img }}">
            Обложка
        </label><br>
        <label>
            <input type="file" name="photos[]" multiple>
            Галерея
        </label><br>
        <input type="date" name="completed"><br>
        <select name="type" id="">
            @foreach($types as $type)
                <option value="{{ $type->id }}" @if($item->type_id == $type->id) selected @endif>{{ $type->name }}</option>
            @endforeach
        </select>
        <textarea name="description" style="display: block" placeholder="Описание">
            {{ $item->description }}
        </textarea><br>
        <button>Создать</button>
    </form>
</body>
</html>
