@extends('layouts.backEndLayout')
@section('content')
    @if($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif
    <form action="{{route('categories.store')}}" method="POST">
        @csrf
        <label for="name">Nom de la nova categoria</label>
        <input type="text" name="name" value="{{ old('name') }}"><br>
        <input type="submit" value="Crear">
    </form>
@endsection