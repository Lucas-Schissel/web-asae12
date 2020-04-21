@extends('template')
@section('conteudo')

<BR>
<BR>
<div class="text text-center" >
<h1>
<i class="icon-hand-peace-o"></i>
{{ $mensagem }}
<i class="icon-smile"></i>
</h1>
<div>
<BR>
<BR>
<h2>{{ $value = session()->get('nome')}}</h2>
<BR>
<BR>
<BR>
<BR>
<div class="text text-center" >
    <h2> ASAE - 12 </h2>
<div>

<div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


@endsection
