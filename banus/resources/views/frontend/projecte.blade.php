@if(isset($projecte))
  <a class="card mb-2" data-groups="@foreach($projecte['categories'] as $categoria){{$categoria}},@endforeach" data-toggle="modal" data-target="#modal_{{$projecte['id']}}">
    @foreach ($projecte['imatges'] as $item)
      @if($loop->first) <img class="primeraImg" src="{{url($item['url'])}}" /> @endif
    @endforeach
    <div class="title text_titulo">
      {{$projecte['titol']}}
    </div>
  </a>
@else
  <a class="card mb-2" width="400" heigth="400" data-groups="" data-toggle="modal" data-target="#modal_">
      <img width="300" heigth="150" class="primeraImg" src="" /> 

    <div class="title text_titulo">
      
    </div>
  </a>
@endif







