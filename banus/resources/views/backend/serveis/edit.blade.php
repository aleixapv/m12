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
    <form action="{{route('serveis.update',['id'=>$servei->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-25">
                <label for="nom">Nom del servei: <i class="req">*</i></label>
            </div>
            <div class="col-75">
                <input type="text" name="nom" value="{{ old('nom') }}" id="nom">
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="descripcio">Descripció del servei: <i class="req">*</i></label>
            </div>
            <div class="col-75">
                <textarea name="descripcio" id="descripcio">{{ old('descripcio') }}</textarea>
            </div>
        </div>
        
        <div class="row">
            <div class="col-25">
                <label for="imatge">Imatge del nou servei: <i class="req">*</i></label>
            </div>
            <div class="col-75">
                <input type="file" name="imatge"  value="{{ old('imatge') }}" id="imatge">
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
                <input type="submit" value="Editar" >
            </div>
        </div>

    </form>
    <script src="{{url('js/src/jquery.min.js')}}"></script>
    <script src="{{url('js/serveis.js')}}"></script>
@endsection