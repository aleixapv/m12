@extends('layouts.backEndLayout')
@section('content')
    <a href="{{route('projectes.create')}}" class="btn btn-success mb-2">Nou Projecte</a>
    <table class="table table-striped">
        @php
            $numero = 1;
        @endphp
         @forelse ($projectes as $projecte)
            <tbody>
                <tr>
                    <th scope="row">{{$numero}}</th>
                    <td>
                        <div class="row">
                            <h5> {{ $projecte->titol }}</h5>
                        </div>
                    </td>
                    <td>
                        <div>
                            <a href="{{route('projectes.edit',['id' => $projecte->id])}}" class="btn btn-success"> Editar</a>
                        </div>
                    </td>
                    <td>
                        <div>
                            <a href="{{route('projectes.show',['id' => $projecte->id])}}"  class="btn btn-primary"> Veure</a>
                        </div>
                    </td>
                    <td>
                        <div>
                            <form action="{{route('projectes.destroy',['id' => $projecte->id])}}" method="POST">
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
            <p>No hi han projectes</p>
        @endforelse
    </table>
    
@endsection