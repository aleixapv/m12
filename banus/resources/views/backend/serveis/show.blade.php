@extends('layouts.backEndLayout')
@section('content')
    <h1>nom: {{$servei->nom}}</h1><br>
    <h1>descripcio:</h1><br>
    <p>{{$servei->descripcio}}</p><br>
    <h1>imatge:</h1>
    <img src="{{url($servei->imatge)}}" alt="">

    </ul>
@endsection