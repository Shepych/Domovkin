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
    <h1>Создать</h1>

    <form method="POST" action="{{ route('admin.articles.method.create') }}" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" placeholder="Заголовок" value="{{ old('title') }}"><br>
        <input type="file" name="img">
        <textarea name="description" style="display: block" name="seo" placeholder="Описание"></textarea><br>
        <textarea name="seo_description" style="display: block" name="seo" placeholder="seo"></textarea><br>
        <textarea id="tinymce" name="body">{{ old('body') }}</textarea>
        <button>Создать</button>
    </form>

    <script src="https://cdn.tiny.cloud/1/3wrve23yhs9g7bb641i6jcht2m1pqvqci3aasw81z84r2ooo/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#tinymce',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
    </script>
</body>
</html>
