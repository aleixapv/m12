@extends('layouts.backEndLayout')
@section('content')
    @if($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
    @endif
    <div class="alert alert-danger" id="error" hidden>
        Omple els camps.
    </div>
    <form action="{{route('projectes.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-25">
                <label for="titol">Titol del projecte: <i class="req">*</i></label>
            </div>
            <div class="col-75">
                <input type="text" name="titol" value="{{ old('titol') }}" >
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="descripcio_breu">Descripció breu del projecte: <i class="req">*</i></label>
            </div>
            <div class="col-75">
                <textarea name="descripcio_breu" >{{ old('descripcio_breu') }}</textarea>
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="descripcio_detallada">Descripció detallada del projecte: <i class="req">*</i></label>
            </div>
            <div class="col-75">
                <textarea name="descripcio_detallada" >{{ old('descripcio_detallada') }}</textarea>
            </div>
        </div>
       
        <div class="row">
            <div class="col-25">
                <label for="categories">Categorias del projecte: <i class="req">*</i></label>
            </div>
            <div class="col-75">
                <select name="categories[]" multiple >
                    @forelse ($categories as $categoria)
                        <option value="{{$categoria->id}}">{{$categoria->name}}</option>
                    @empty
                        <p>No hi han categories</p>
                    @endforelse
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="descripcio_detallada">Imates del projecte: <i class="req">*</i></label>
            </div>
            <div class="col-75">
                <input type="file" name="imatges[]" multiple value="{{ old('imatges') }}">
            </div>
        </div>
        
        <div class="row">
            <input type="button" class="comprovar" id="comprovar" value="Comprovar">
        </div>
        <div id="divExemple" hidden>
            <br>
            <h3>Previsualització:</h3>
            <div class="row col-12">
                <div class="col-6">
                    <h6>Comprova si el resultat es el que vols dins del recuadre.</h6>
                </div>
                <div class="col-6 container">
                    <div>
                        <h6 id="nomExemple"></h6>
                        <h6 id="descripcioExemple"></h6>
                        <img src="" alt="" id="imatgeExemple">
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <input type="submit" value="Crear" >
            </div>
        </div>
    </form>
@endsection