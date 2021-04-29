@extends('layouts.backEndLayout')
@section('content')
    @if($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif
    <form action="{{route('serveis.update',['id'=>$servei->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="nom">Nom del servei</label>
        <input type="text" name="nom" value="{{ $servei->nom }}" "><br>
        <label for="descripcio">Descripció del servei</label>
        <textarea name="descripcio" >{{ $servei->descripcio }}</textarea><br>
        <img src="{{url($servei->imatge)}}" alt="">
        <label for="imatge">Imatge nova per el servei</label>
        <input type="file" name="imatge"><br>
        <input type="submit" value="Crear">
    </form>
@endsection