@extends('layouts.backEndLayout')
@section('content')
    <a href="{{route('xarxes.create')}}">Nova Xarxa social</a>
    @forelse ($xarxes as $xarxa)
        <li>
            {{ $xarxa->nom }}
            <a href="{{route('xarxes.edit',['id' => $xarxa->id])}}"> Editar</a>
            <form action="{{route('xarxes.destroy',['id' => $xarxa->id])}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Estas segur?')">Eliminar</button>
            </form>
        </li>
    @empty
        <p>No hi han categories</p>
    @endforelse
@endsection