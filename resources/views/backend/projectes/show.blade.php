@extends('layouts.backEndLayout')
@section('content')
    <a href="{{ url()->previous() }}" class="btn btn-primary">Enrrere</a>
    @php
        $contador = 1;
    @endphp
    <div class="work">
        <div class="category-buttons d-none d-lg-block">
            <a href="#" class="active all" data-group="all" hidden>Tot</a>
        </div>
    
        <div id="grid"" class="grid">
            @include('frontend/projecte')
            <br>
            @php
                $contador ++;
            @endphp
        
            <a class="card" href="#" data-groups="" hidden>
                <img src="" />
                <div class="title">Project Title</div>
            </a>
            
            <div class="guide"></div>
        </div>
    </div>
    @php
        $contador = 1;
    @endphp
    
    @include('frontend/modalProjecte')
    @php
        $contador ++;
    @endphp
  
    
    
{{--/////
    @include('frontend/projecte')
    @include('frontend/modalProjecte')--}}
    <link rel="stylesheet" href="{{url('css/projectes.css')}}">
    <script src="{{url('js/projectesfrontend.js')}}"></script>
@endsection