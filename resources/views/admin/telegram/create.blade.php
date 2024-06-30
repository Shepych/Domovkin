<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        #tinymce p {
            margin: 0 !important
        }
    </style>
</head>
<body>
    <h1>Создать пост в телеграм</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.telegram.articles.create') }}">
        @csrf
        <textarea id="tinymce" name="content">{{ old('content') }}</textarea>
        {{-- <textarea id="my-text-area" name="content">{{ old('body') }}</textarea> --}}
        {{-- <textarea name="content" style="display: block" placeholder="Контент">{{ old('content') }}</textarea><br> --}}
        <button>Создать</button>
    </form>

    <script src="https://cdn.tiny.cloud/1/9jjohr3u0gwoo21jv3tf4ixtgtu8sx0ukidmyoellnfyr7vk/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#tinymce',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
            image_title: true,
            automatic_uploads: true,
            images_upload_url: '/admin/upload',
            file_picker_types: 'image',
            forced_root_block: false,  // Добавьте этот параметр
            force_br_newlines: true,   // Используйте <br> вместо <p>
            force_p_newlines: false,   // Отключите автоматическое добавление <p>   
            height: 800,
            formats: {
                underline: { inline: 'u', exact: true }
            },  
            content_style: 'p,h2,h3,h1 {margin: 0;}'  
        })
    </script>
</body>
</html>
