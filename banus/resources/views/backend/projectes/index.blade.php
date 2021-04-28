@extends('layouts.backEndLayout')
@section('content')
    <a href="{{route('projectes.create')}}">Nou Projecte</a>
    @forelse ($projectes as $projecte)
        <li>
            {{ $projecte->titol }}
            <a href="{{route('projectes.edit',['id' => $projecte->id])}}"> Editar</a>
            <a href="{{route('projectes.show',['id' => $projecte->id])}}"> Veure</a>
            <form action="{{route('projectes.destroy',['id' => $projecte->id])}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Estas segur?')">Eliminar</button>
            </form>
        </li>
    @empty
        <p>No hi han projectes</p>
    @endforelse
@endsection