@extends('layouts.backEndLayout')
@section('content')
    <a href="{{route('serveis.create')}}" class="btn btn-success">Nou Servei</a>
    <table class="table table-striped">
        @php
            $numero = 1;
        @endphp
        @forelse ($serveis as $servei)
            <tbody>
                <tr>
                    <th scope="row">{{$numero}}</th>
                    <td>
                        <div class="row">
                            <h5> {{ $servei->nom }}</h5>
                        </div>
                    </td>
                    <td>
                        <div>
                            <a href="{{route('serveis.edit',['id' => $servei->id])}}" class="btn btn-success"> Editar</a>
                        </div>
                    </td>
                    <td>
                        <div>
                            <form action="{{route('serveis.destroy',['id' => $servei->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Estas segur?')" class="btn btn-danger">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            </tbody>
            @php
                $numero++;
            @endphp
        @empty
            <p>No hi han serveis</p>
        @endforelse
    </table>
@endsection