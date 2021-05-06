@extends('layouts.backEndLayout')
@section('content')
    <a href="{{route('xarxes.create')}}">Nova Xarxa social</a>
    <table class="table table-striped">
        @php
            $numero = 1;
        @endphp
        @forelse ($xarxes as $xarxa)
            <tbody>
                <tr>
                    <th scope="row">{{$numero}}</th>
                    <td>
                        <div class="row">
                            <i class="{{ $xarxa->icona }} mt-2 mr-1"></i><h5> {{ $xarxa->nom }}</h5>
                        </div>
                    </td>
                    <td><a href="{{ $xarxa->enllac }}">{{ $xarxa->enllac }}</a></td>
                    <td>
                        <div>
                            <a href="{{route('xarxes.edit',['id' => $xarxa->id])}}"> Editar</a>
                        </div>
                    </td>
                    <td>
                        <div>
                            <form action="{{route('xarxes.destroy',['id' => $xarxa->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Estas segur?')">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            </tbody>
            @php
                $numero++;
            @endphp
        @empty
            <p>No hi han categories</p>
        @endforelse
       
    </table>
@endsection