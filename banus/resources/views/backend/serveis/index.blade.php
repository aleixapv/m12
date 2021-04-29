@extends('layouts.backEndLayout')
@section('content')
    <a href="{{route('serveis.create')}}">Nou Servei</a>
    @forelse ($serveis as $servei)
        <li>
            {{ $servei->nom }}
            <a href="{{route('serveis.edit',['id' => $servei->id])}}"> Editar</a>
            <a href="{{route('serveis.show',['id' => $servei->id])}}"> Veure</a>
            <form action="{{route('serveis.destroy',['id' => $servei->id])}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Estas segur?')">Eliminar</button>
            </form>
        </li>
    @empty
        <p>No hi han serveis</p>
    @endforelse
@endsection