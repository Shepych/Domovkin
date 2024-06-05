<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Редактирование статьи</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.articles.method.update', ['id' => $article->id]) }}" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" placeholder="Заголовок" value="{{ old('title') ? old('title') : $article->title }}"><br>
        <div style="display:flex;flex-direction:column;margin-top:30px;margin-bottom:30px">
            <input type="file" name="img">
            <img src="{{ $article->poster() }}" width="200px">
        </div>
        <textarea name="description" style="display: block" placeholder="Описание">{{ old('description') ? old('description') : $article->description }}</textarea><br>
        <textarea name="seo_description" style="display: block" placeholder="SEO">{{ old('seo_description') ? old('seo_description') : $article->seo }}</textarea><br>
        <textarea id="tinymce" name="body">{{ old('body') ? old('body') : $article->content }}</textarea>
        <button>Сохранить</button>
    </form>

    <script src="https://cdn.tiny.cloud/1/9jjohr3u0gwoo21jv3tf4ixtgtu8sx0ukidmyoellnfyr7vk/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#tinymce',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
            image_title: true,
            automatic_uploads: true,
            images_upload_url: '/admin/upload/{{ request()->id }}',
            file_picker_types: 'image',
        })
    </script>
</body>
</html>