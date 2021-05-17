@extends('layouts.backEndLayout')
@section('content')

<div class="">
    
    <div class="row">
        <div class="col-75">
            <h1>Informació de la empresa</h1>
            
        </div>
        <div class="col-1 boto_editar">
            <a href="{{route('informacio.empresa.edit')}}" class="float-rigth btn btn-success">Editar</a>
        </div>
    </div>
   
    <div class="row">
        <div class="col-25">
            <h6>Nom de la empresa:</h6>
        </div>
        <div class="col-75">
            <h6>{{$informacio->nom_empresa}}</h6>
        </div>
    </div>
    <div class="row">
        <div class="col-25">
            <h6>Eslogan:</h6>
        </div>
        <div class="col-75">
            <h6>{{$informacio->eslogan}}</h6>
        </div>
    </div>
    <div class="row">
        <div class="col-25">
            <h6>Tel de contacte:</h6>
        </div>
        <div class="col-75">
            <h6>{{$informacio->tel}}</h6>
        </div>
    </div>
    <div class="row">
        <div class="col-25">
            <h6>Segon Tel de contacte:</h6>
        </div>
        <div class="col-75">
            <h6>{{$informacio->tel2}}</h6>
        </div>
    </div>
    <div class="row">
        <div class="col-25">
            <h6>Whatsapp de contacte:</h6>
        </div>
        <div class="col-75">
            <h6>{{$informacio->whatsapp}}</h6>
        </div>
    </div>
    <div class="row">
        <div class="col-25">
            <h6>Correu electrònic de contacte:</h6>
        </div>
        <div class="col-75">
            <h6>{{$informacio->correu}}</h6>
        </div>
    </div>
    <div class="row">
        <div class="col-25">
            <h6>Adreça de contacte:</h6>
        </div>
        <div class="col-75">
            <h6>{{$informacio->adreca_1}}</h6>
        </div>
    </div>
    <div class="row">
        <div class="col-25">
            <h6>Segona adreça de contacte:</h6>
        </div>
        <div class="col-75">
            <h6>{{$informacio->adreca_2}}</h6>
        </div>
    </div>
    <div class="row">
        <div class="col-25">
            <h6>Ciutat:</h6>
        </div>
        <div class="col-75">
            <h6>{{$informacio->ciutat}}</h6>
        </div>
    </div>
    <div class="row">
        <div class="col-25">
            <h6>Provincia:</h6>
        </div>
        <div class="col-75">
            <h6>{{$informacio->provincia}}</h6>
        </div>
    </div>
    <div class="row">
        <div class="col-25">
            <h6>Codi postal:</h6>
        </div>
        <div class="col-75">
            <h6>{{$informacio->zip_cp}}</h6>
        </div>
    </div>
    <div class="row">
        <div class="col-25">
            <h6>Logo actual:</h6>
        </div>
        <div class="col-75">
            <img src="{{url($informacio->url_logo)}}" alt="{{$informacio->alt_logo}}" width="50px" height="50px"> 
        </div>
    </div>
</div>


@endsection  
