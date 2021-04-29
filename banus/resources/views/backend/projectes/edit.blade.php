@extends('layouts.backEndLayout')
@section('content')
    @if($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif
    <form action="{{route('projectes.update',['id' => $projecte->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="titol">Titol del nou projecte</label>
        <input type="text" name="titol" value="{{ $projecte->titol }}" "><br>
        <label for="descripcio_breu">Descripció breu del nou projecte</label>
        <textarea name="descripcio_breu" > {{ $projecte->descripcio_breu }} </textarea><br>
        <label for="descripcio_detallada">Descripció detallada del nou projecte</label>
        <textarea name="descripcio_detallada" >{{ $projecte->descripcio_detallada }}</textarea><br>
        <label for="categories">Categorias del nou projecte</label>
        <select name="categories[]" multiple ">
            @forelse ($categories as $categoria)
                @foreach ($categoriesDelProjecte as $categoriaDelProjecte)
                    @if ($categoriaDelProjecte->id == $categoria->id)
                        <option value="{{$categoria->id}}" selected>{{$categoria->name}}</option>
                    @else
                        <option value="{{$categoria->id}}">{{$categoria->name}}</option>
                    @endif
                @endforeach
            @empty
                <p>No hi han categories</p>
            @endforelse
        </select><br>
        
        <label for="imatges">Afegit imates del nou projecte</label>
        <input type="file" name="imatges[]" multiple value="{{ old('imatges') }}"><br>
        <input type="submit" value="Crear">
    </form><br>
    <h1>imatges</h1>
    @forelse ($imatges as $imatge)
            <div>
                <img src="{{url($imatge->url)}}" alt="{{$imatge->alt}}">
                <button class="eliminar" idImatge="{{$imatge->id}}">Eliminar</button>
            </div><br>
        @empty
            <p>No hi han imatges</p>
        @endforelse
@endsection
<script src="{{url('js/src/jquery.min.js')}}"></script>
<script src="{{url('js/projectes.js')}}"></script>