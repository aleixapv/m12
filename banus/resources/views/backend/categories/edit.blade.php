@extends('layouts.backEndLayout')
@section('content')
    <form action="{{route('categories.update')}}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Nom de la categoria</label>
        <input type="text" name="name" id="" value="{{$categoria->name}}"><br>
        <input type="submit" value="Actualitzar">
    </form>
@endsection