@extends('layouts.backEndLayout')
@section('content')
    @if($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif
    <form action="{{route('informacio.empresa.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="nom_empresa">Nom de la empresa</label>
        <input type="text" name="nom_empresa" value="{{ old('nom_empresa') }}" ><br>

        <label for="eslogan">Eslogan</label>
        <input type="text" name="eslogan" value="{{ old('eslogan') }}"><br>

        <label for="tel">Tel</label>
        <input type="text" name="tel" value="{{ old('tel') }}"><br>

        <label for="tel2">Tel2</label>
        <input type="text" name="tel2" value="{{ old('tel2') }}"><br>

        <label for="whatsapp">whatsapp</label>
        <input type="text" name="whatsapp" value="{{ old('whatsapp') }}"><br>

        <label for="correu">correu</label>
        <input type="text" name="correu" value="{{ old('correu') }}"><br>

        <label for="adreca_1">adreca_1</label>
        <input type="text" name="adreca_1" value="{{ old('adreca_1') }}" "><br>

        <label for="adreca_2">adreca_2</label>
        <input type="text" name="adreca_2" value="{{ old('adreca_2') }}" "><br>

        <label for="ciutat">ciutat</label>
        <input type="text" name="ciutat" value="{{ old('ciutat') }}"><br>

        <label for="provincia">provincia</label>
        <input type="text" name="provincia" value="{{ old('provincia') }}"><br>

        <label for="zip_cp">zip/cp</label>
        <input type="text" name="zip_cp" value="{{ old('zip_cp') }}"><br>

        <label for="alt_logo">alt_logo</label>
        <input type="text" name="alt_logo" value="{{ old('alt_logo') }}"><br>

        <label for="imatge">Imates del nou projecte</label>
        <input type="file" name="imatge"  value="{{ old('imatge') }}"><br>
        <input type="submit" value="Crear">
    </form>
@endsection