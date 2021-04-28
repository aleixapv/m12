@extends('layouts.backEndLayout')
@section('content')
    <h1>titol: {{$projecte->titol}}</h1><br>
    <h1>descripcio breu:</h1><br>
    <p>{{$projecte->descripcio_breu}}</p><br>
    <h1>descripcio detallada:</h1><br>
    <p>{{$projecte->descripcio_detallada}}</p><br>
    <h1>categorias:</h1>
    <ul>
        @forelse($categories as $categoria)
            <li>{{$categoria->name}}</li>
        @empty
            <li>no te categories</li>
        @endforelse
    </ul>
    <h1>imatges:</h1>
    <ul>
        @forelse($imatges as $imatge)
            <img src="{{url($imatge->url)}}" alt="">
        @empty
            <li>no te imatges</li>
        @endforelse
    </ul>
@endsection