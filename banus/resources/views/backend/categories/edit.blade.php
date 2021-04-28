@extends('layouts.backEndLayout')
@section('content')
    @if($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif
    <form action="{{route('categories.update',['id' => $categoria->id])}}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Nom de la categoria</label>
        <input type="text" name="name" id="" value="{{$categoria->name}}"><br>
        <input type="submit" value="Actualitzar">
    </form>
@endsection