<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Проект</title>
</head>
<body>
    <h1>Редактирование проекта</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.projects.method.update', ['id' => $project->id]) }}" enctype="multipart/form-data">
        @csrf
        <input type="text" name="price" placeholder="Цена" value="{{ old('price') ? old('price') : $project->price }}"><br>
        <div style="display:flex;flex-direction:column;margin-top:30px;margin-bottom:30px">
            <input type="file" name="poster">
            <img src="{{ $project->img }}" width="200px">
        </div>

        <div style="display:flex;flex-direction:column;margin-top:30px;margin-bottom:30px">
            <input type="file" name="photos[]" multiple>
            <div style="display:flex;gap:30px;align-items:flex-start">
                @foreach($project->photos() as $photo)
                    <img src="{{ $photo->src }}" width="200px" style="margin-bottom:30px">
                @endforeach
            </div>
        </div>

        <select name="material">
            @foreach($materials as $material):
            <option @if($material->id == $project->material) selected @endif value="{{ $material->id }}">{{ $material->name }}</option>
            @endforeach
        </select>
        
        <select name="roof">
            @foreach($roofs as $roof):
            <option @if($roof->id == $project->roof) selected @endif value="{{ $roof->id }}">{{ $roof->name }}</option>
            @endforeach
        </select><br>
        <input type="text" name="term" placeholder="Срок строительства" value="{{ old('term') ? old('term') : $project->term }}"> Срок строительства (мес)<br>
        <input type="text" name="floors" placeholder="Этажность" value="{{ old('floors') ? old('floors') : $project->floors }}"> Этажность<br>
        <input type="text" name="square" placeholder="Квадратура" value="{{ old('square') ? old('square') : $project->square }}"> Квадратура<br>
        <input type="text" name="power" placeholder="Потребляемая мощность" value="{{ old('power') ? old('power') : $project->power }}"> Потребление<br>
        <textarea id="tinymce" name="description" placeholder="Описание">{{ old('description') ? old('description') : $project->description }}</textarea><br>
        {{-- <textarea name="content" placeholder="Контент">{{ old('content') ? old('content') : $project->content }}</textarea> --}}
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