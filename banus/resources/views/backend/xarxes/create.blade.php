@extends('layouts.backEndLayout')
@section('content')
    @if($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif
    <form action="{{route('xarxes.store')}}" method="POST">
        @csrf
        <label for="nom">Nom de la nova xarxa social</label>
        <input type="text" name="nom" value="{{ old('nom') }}"><br>
        <label for="icona">Icona de la xarxa social</label>
        <input type="text" name="icona" value="{{ old('icona') }}"><br>
        <label for="enllac">Enllaç de la xarxa social</label>
        <input type="text" name="enllac" value="{{ old('enllac') }}"><br>
        <input type="submit" value="Crear">
    </form>
@endsection