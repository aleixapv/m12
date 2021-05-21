@if(isset($projecte))
    <a class="cardProjecte card mb-2 modal_projectes" id="modalprojectes" data-groups="@foreach($projecte['categories'] as $categoria){{$categoria}},@endforeach" data-toggle="modal" data-target="#modal_{{$projecte['id']}}">
      @foreach ($projecte['imatges'] as $item)
        @if($loop->first) <img class="primeraImg hvr-shrink" src="{{url($item['url'])}}" /> @endif
      @endforeach
      <div class="title text_titulo">
        {{$projecte['titol']}}
      </div>
    </a>
@else
  <a class="card mb-2" width="300" data-groups="" data-toggle="modal" data-target="#modal_" style="width: 300px;">
      <img width="300" heigth="150" class="primeraImg" src="" /> 

    <div class="title text_titulo">
      
    </div>
  </a>
@endif







