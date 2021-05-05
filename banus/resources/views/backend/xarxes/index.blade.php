@extends('layouts.backEndLayout')
@section('content')
    <a href="{{route('xarxes.create')}}">Nova Xarxa social</a>
    @forelse ($xarxes as $xarxa)
        <div class="row">
            <div class="ml-4">
                <i class="{{ $xarxa->icona }}"></i>
            </div>
            <div class="ml-4">
                <h6> {{ $xarxa->nom }}</h6>
            </div>
            <div class="ml-4">
                <a href="{{route('xarxes.edit',['id' => $xarxa->id])}}"> Editar</a>
            </div>
            <div class="ml-4">
                <form action="{{route('xarxes.destroy',['id' => $xarxa->id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Estas segur?')">Eliminar</button>
                </form>
            </div>
        </div>

    @empty
        <p>No hi han categories</p>
    @endforelse
@endsection