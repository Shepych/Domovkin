<style>
    td {
        padding: 5px
    }
</style>
<a href="{{ route('client.profile') }}">Назад</a>

<form action="{{ route('admin.services.create') }}" method="POST">
    @csrf
    <input type="text" name="title" placeholder="Услуга"><br>
    <select name="type_id">
        @foreach ($types as $type)
            <option @if($type->id == 2) selected @endif value="{{ $type->id }}">{{ $type->name }}</option>
        @endforeach
    </select><br>
    <select name="category_id">
        @foreach ($categories as $category)
            <option @if($category->id == 21) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select><br>
    <input type="text" name="price" placeholder="руб"><br>
    <input type="submit" value="Создать">
</form>
@foreach ($categories as $category)
    <div>
        <h3>{{ $category->name }}</h3>

        @if(count($category->services))
            <table border="1">
                @foreach ($category->services as $service)
                    <tr>
                        <td>{{ $service->name }}</td>
                        <td>{{ $service->type->name }}</td>
                        <td>{{ $service->price ? $service->price : 0 }}</td>
                    </tr>
                @endforeach
            </table>
        @endif
    </div>
@endforeach