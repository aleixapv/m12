@extends('layouts.backEndLayout')
@section('content')
    @if($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif
    <form action="{{route('xarxes.update',['id'=>$xarxa->id])}}" method="POST">
        @csrf
        @method('PUT')
        <label for="nom">Nom de la xarxa social</label>
        <input type="text" name="nom" value="{{ $xarxa->nom }}"><br>
        <label for="icona">Icona de la xarxa social</label>
        <input type="text" name="icona" value="{{ $xarxa->icona }}"><br>
        <label for="enllac">Enllaç de la xarxa social</label>
        <input type="text" name="enllac" value="{{ $xarxa->enllac }}"><br>
        <input type="submit" value="Actualitzar">
    </form>
@endsection