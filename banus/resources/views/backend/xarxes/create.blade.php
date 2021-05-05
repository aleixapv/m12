@extends('layouts.backEndLayout')
@section('content')
    @if($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif
    <form action="{{route('xarxes.store')}}" method="POST" id="formXarxa">
        @csrf
        <label for="nom">Nom de la nova xarxa social</label>
        <input type="text" name="nom" value="{{ old('nom') }}" id="nomXarxa" ><br>
        <a href="https://fontawesome.com/icons?d=gallery&p=2&m=free" target="_blank">Buscar icones</a> <br>
        <label for="icona">Icona de la xarxa social</label>
        <input type="text" name="icona" value="fab fa-" id="iconaXarxa"><br>
        <label for="enllac">Enllaç de la xarxa social</label>
        <input type="text" name="enllac" value="{{ old('enllac') }}" id="enllac"><br>
        <input type="submit" value="Crear">
    </form>
    <div>
        <h1>Previsualització</h1>
        <a href="" id="exemple" target="_blank"><i class=""></i></a>
    </div>
    <script src="{{url('js/src/jquery.min.js')}}"></script>
    <script src="{{url('js/xarxes.js')}}"></script>
@endsection