@extends('layouts.backEndLayout')
@section('content')
    <a href="{{ url()->previous() }}" class="btn btn-primary mb-2">Enrrere</a>
    <div class="" id="containerprojecte">
        <div class="row d-flex justify-content-center" id="card_index"  style="display: none;" >
            @include('frontend/servei')
          </div>
    </div>
    <link rel="stylesheet" href="{{url('css/index.css')}}">
    <script src="{{url('js/indexfrontend.js')}}"></script>
@endsection