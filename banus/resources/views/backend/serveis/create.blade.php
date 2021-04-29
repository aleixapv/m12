@extends('layouts.backEndLayout')
@section('content')
    @if($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif
    <form action="{{route('serveis.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="nom">Nom del nou servei</label>
        <input type="text" name="nom" value="{{ old('nom') }}" "><br>
        <label for="descripcio">Descripció del nou servei</label>
        <textarea name="descripcio" >{{ old('descripcio') }}</textarea><br>
        <label for="imatge">Imatge del nou servei</label>
        <input type="file" name="imatge"  value="{{ old('imatge') }}"><br>
        <input type="submit" value="Crear">
    </form>
@endsection