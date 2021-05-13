@extends('layouts.frontEndLayout')
@section('content')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.2/dist/leaflet.css" />
   <link rel="stylesheet" href="{{url('css/contacte.css')}}">
   <script src="{{url('js/contactefrontend.js')}}"></script>
    <div class="container">
        <div class="row">
        <div  class="col-12 ">
        <div class="float-left " id="map" >

        </div>
        </div>
        <div class="row col 12 mt-4" id="contacte">
            <div class="col-4" id="contacte_p1">
                <h1>Contacta amb nosaltres</h1>
                <li class="ml-4"><b>Telefon:</b> {{$informacio->tel}}</li>
                <li class="ml-4"><b>Correu electronic:</b> <a href="mailto:{{$informacio->correu}}"> {{$informacio->correu}} </a></li>
            </div>
            <div class="col-4" id="contacte_p2">
                <br>
                <br>
                <li class="ml-4"><b>Seu:</b> <a target=”_blank” href="https://www.google.es/maps/place/Fusteria+Ban%C3%BAs/@41.3502168,1.7077639,17z/data=!3m2!4b1!5s0x12a47a2988ea0e57:0xcba54c259367194!4m5!3m4!1s0x12a479e8c654d949:0xbc67939504c48504!8m2!3d41.3502168!4d1.7099526"> {{$informacio->adreca_1}}, {{$informacio->zip_cp}} {{$informacio->ciutat}}, {{$informacio->provincia}} </a></li>
            </div>
            <div class="fill col-6 mt-5" id="boto_contacte" data-toggle="modal" data-target="#formulari_contacte_modal">
            <button class="button type3">
                Click per demanar una visita
            </button>
            </div>
        </div>
        <div class="modal fade" id="formulari_contacte_modal" role="form">
            <div class="modal-dialog">
            
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                
                <h4 class="modal-title">Enviar missatge</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <div id="formulari_contacte">
                <form action="/action_page.php">
                    <div  id="form_contacte" class="">
                        <div class="form-group ">
                        <label >Nom:</label>
                        <input type="text" class="form-control" id="nom_contacte" placeholder="Escriu el teu nom" name="nom_contacte">
                        </div>
            
                        <div class="form-group ">
                        <label for="pwd">Correo Electronic:</label>
                        <input type="email" class="form-control" id="email_contacte" placeholder="Escriu el teu correu electronic" name="email_contacte">
                        </div>
                        
                        <div class="form-group">
                        <label for="pwd">Missatge:</label>
                        <textarea rows="4" cols="50" class="form-control" id="missatge_contacte" placeholder="Escriu el teu correu missatge" name="missatge_contacte" style="resize: none;"></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </form>
            </div>
                </div>
                <div class="modal-footer">
                </div>
            </div>
            
        </div>
            
        </div>
        </div>
        </div>

    </div>
    <script src="https://unpkg.com/leaflet@1.0.2/dist/leaflet.js"></script>
@endsection