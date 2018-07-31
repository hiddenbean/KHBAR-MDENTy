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
            <a class='btn btn-lg' href="{{url('khbarat/1/reactions/0/comments/ajouter')}}" style='background-color:transparent;'>
                <i class="fa fa-pencil"></i> Comment
                </a>
        </div>
        <div class="col-6">
            <a class='btn btn-lg' href="{{url('khbarat/1/reactions/0/pictures/ajouter')}}" style='background-color:transparent;'>
        <i class="fa fa-pencil"></i> Image
            </a>
        </div>
       
    </div>
    <div class="card-footer">
      <small class="text-muted">Last updated 3 mins ago</small>
@foreach($reactions->where('reaction_id',NULL) as $reaction)
      <div class="card">
        <div class="card-body">
        <!-- {{ $reaction->userable->company_name ? $name = $reaction->userable->company_name : $name = $reaction->userable->last_name.' '.$reaction->userable->first_name }} -->
          <h5 class="card-title">{{$name}}</h5>
        <!-- {{ $reaction->reactionable->comment ? $comment = $reaction->reactionable->comment : $comment = $reaction->reactionable->description }} -->
          <p class="card-text">{{$comment}}.</p>
          @if($reaction->reactionable->path)
          <img width="100%" src="{{ Storage::url($reaction->reactionable->path) }}"/>
          @endif
            
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                Replay
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="{{url('khbarat/1/reactions/'.$reaction->id.'/comments/ajouter')}}">Comment</a>
              <a class="dropdown-item" href="{{url('khbarat/1/reactions/'.$reaction->id.'/pictures/ajouter')}}">Image</a>
            </div><br><br>
        </div>
      </div>
                      @foreach($reactions->where('reaction_id',$reaction->id) as $replay_reaction)
                      <div class="card" style="width:90%;float:right;">
                        <div class="card-body">
                                <!-- {{ $replay_reaction->userable->company_name ? $name = $replay_reaction->userable->company_name : $name = $replay_reaction->userable->last_name.' '.$replay_reaction->userable->first_name }} -->

                          <h5 class="card-title">{{$name}}</h5>
                     <!-- {{ $replay_reaction->reactionable->comment ? $comment = $replay_reaction->reactionable->comment : $comment = $replay_reaction->reactionable->description }} -->
                          <p class="card-text">{{$comment}}.</p>
                            @if($replay_reaction->reactionable->path)
                            <img width="100%" src="{{ Storage::url($replay_reaction->reactionable->path) }}"/>
                            @endif



                            {{-- <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                Replay
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="{{url('khbarat/1/reactions/'.$reaction->id.'/comments/ajouter')}}">Comment</a>
                              <a class="dropdown-item" href="{{url('khbarat/1/reactions/'.$reaction->id.'/pictures/ajouter')}}">Image</a>
                            </div> --}}
                        </div>
                      </div>
                      @endforeach
@endforeach
    </div>
  </div>



</div>
@endsection
