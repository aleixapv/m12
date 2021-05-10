@extends('layouts.backEndLayout')
@section('content')
    @if($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif
    <form action="{{route('categories.update',['id' => $categoria->id])}}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="row">
            <div class="col-25">
                <label for="name">Nom de la categoria: <i class="req">*</i></label>
            </div>
            <div class="col-75">
                <input type="text" name="name" value="{{$categoria->name}}">
            </div>
        </div>
        <div class="row">
            <input type="submit" value="Editar">
        </div>
    </form>
@endsection