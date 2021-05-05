@extends('layouts.backEndLayout')
@section('content')
<a href="{{route('informacio.empresa.edit')}}">Editar</a>
<div class="container">

</div>
{{$informacio->nom_empresa}}
{{$informacio->eslogan}}
{{$informacio->tel}}
{{$informacio->tel2}}
{{$informacio->whatsapp}}
{{$informacio->correu}}
{{$informacio->adreca_1}}
{{$informacio->adreca_2}}
{{$informacio->ciutat}}
{{$informacio->provincia}}
{{$informacio->zip_cp}}
<img src="{{url($informacio->url_logo)}}" alt="{{$informacio->alt_logo}}" srcset="">
@endsection  
