@extends('layouts.backEndLayout')
@section('content')
    <a href="{{route('categories.create')}}">nova categoria</a>
    @forelse ($categories as $categoria)
        <li>
            {{ $categoria->name }}
            <a href="{{route('categories.edit',['id' => $categoria->id])}}"> Editar</a>
            <form action="{{route('categories.destroy',['id' => $categoria->id])}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Estas segur?')">Eliminar</button>
            </form>
        </li>
    @empty
        <p>No hi han categories</p>
    @endforelse
@endsection