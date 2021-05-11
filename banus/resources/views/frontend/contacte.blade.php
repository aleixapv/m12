@extends('layouts.frontEndLayout')
@section('content')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.2/dist/leaflet.css" />
   <link rel="stylesheet" href="{{url('css/contacte.css')}}">
   <script src="{{url('js/contactefrontend.js')}}"></script>
    <div class="container">
        <div class="row">
        <div  class="col-12 ">
        <div class="float-left ml-4" id="map" >

        </div>
            <form action="/action_page.php">
                <div  id="form_contacte" class="col-5 float-right">
                    <div class="form-group col-5 float-left ml-5">
                    <label >Nom:</label>
                    <input type="text" class="form-control" id="nom_contacte" placeholder="Escriu el teu nom" name="nom_contacte">
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="form-group col-5 float-left ml-5">
                    <label for="pwd">Correo Electronic:</label>
                    <input type="email" class="form-control" id="email_contacte" placeholder="Escriu el teu correu electronic" name="email_contacte">
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="form-group col-5 float-left ml-5">
                    <label for="pwd">Missatge:</label>
                    <textarea rows="4" cols="50" class="form-control" id="missatge_contacte" placeholder="Escriu el teu correu missatge" name="missatge_contacte" style="resize: none;"></textarea>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <button type="submit" class="btn btn-primary float-left col-2">Enviar</button>
                </div>
            </form>
        </div>
        </div>
        </div>
        </div>

    </div>
    <script src="https://unpkg.com/leaflet@1.0.2/dist/leaflet.js"></script>
@endsection