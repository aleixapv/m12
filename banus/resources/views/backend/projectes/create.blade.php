@extends('layouts.backEndLayout')
@section('content')
    @if($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif
    <form action="{{route('projectes.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="titol">Titol del nou projecte</label>
        <input type="text" name="titol" value="{{ old('titol') }}" "><br>
        <label for="descripcio_breu">Descripció breu del nou projecte</label>
        <textarea name="descripcio_breu" >{{ old('descripcio_breu') }}</textarea><br>
        <label for="descripcio_detallada">Descripció detallada del nou projecte</label>
        <textarea name="descripcio_detallada" >{{ old('descripcio_detallada') }}</textarea><br>
        <label for="categories">Categorias del nou projecte</label>
        <select name="categories[]" multiple ">
            @forelse ($categories as $categoria)
                <option value="{{$categoria->id}}">{{$categoria->name}}</option>
            @empty
                <p>No hi han categories</p>
            @endforelse
        </select><br>
        <label for="imatges">Imates del nou projecte</label>
        <input type="file" name="imatges[]" multiple value="{{ old('imatges') }}"><br>
        <input type="submit" value="Crear">
    </form>
@endsection