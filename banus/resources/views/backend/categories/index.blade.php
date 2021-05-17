@extends('layouts.backEndLayout')
@section('content')
    <a href="{{route('categories.create')}}" class="btn btn-success">Nova Categoria</a>
    <table class="table table-striped">
        @php
            $numero = 1;
        @endphp
         @forelse ($categories as $categoria)
            <tbody>
                <tr>
                    <th scope="row">{{$numero}}</th>
                    <td>
                        <div class="row">
                            <h5> {{ $categoria->name }}</h5>
                        </div>
                    </td>
                    <td>
                        <div>
                            <a class="btn btn-success" href="{{route('categories.edit',['id' => $categoria->id])}}"> Editar</a>
                        </div>
                    </td>
                    <td>
                        <div>
                            <form action="{{route('categories.destroy',['id' => $categoria->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Estas segur?')">Eliminar</button>
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