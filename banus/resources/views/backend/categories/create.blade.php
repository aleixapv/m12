@extends('layouts.backEndLayout')
@section('content')
    <form action="{{route('categories.store')}}" method="POST">
        @csrf
        <label for="name">Nom de la nova categoria</label>
        <input type="text" name="name" id=""><br>
        <input type="submit" value="Crear">
    </form>
@endsection