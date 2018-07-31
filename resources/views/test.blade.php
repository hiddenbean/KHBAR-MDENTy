@extends('layouts.app')

@section('body')
<div class="container">

<div class="card-deck">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title"><div class="btn-group">
  <button type="button" class="btn btn-lg dropdown-toggle" data-toggle="dropdown" data-placement="bottom" title="intervention"  aria-haspopup="true" aria-expanded="false" style='background-color:transparent;'>
    <i class="fa fa-pencil"></i>
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="{{url('khbarat/1/interventions/comments/ajouter')}}">Comment</a>
    <a class="dropdown-item" href="{{url('khbarat/1/interventions/pictures/ajouter')}}">Image</a>
  </div>
</div> Card title </h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
    </div>
    <div class="row">
        <div class="col-6">
            <a class='btn btn-lg' href="{{url('khbarat/1/réactions/0/comments/ajouter')}}" style='background-color:transparent;'>
                <i class="fa fa-pencil"></i> Comment
                </a>
        </div>
        <div class="col-6">
            <a class='btn btn-lg' href="{{url('khbarat/1/réactions/0/pictures/ajouter')}}" style='background-color:transparent;'>
        <i class="fa fa-pencil"></i> Image
            </a>
        </div>
       
    </div>
    <div class="card-footer">
      <small class="text-muted">Last updated 3 mins ago</small>
    </div>
  </div>
  



</div>
@endsection
