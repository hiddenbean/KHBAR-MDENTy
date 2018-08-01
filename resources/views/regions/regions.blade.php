@extends('layouts.partner.app')
@section('css')
<link media="screen" type="text/css" rel="stylesheet" href="{{asset('plugins/jquery-nestable/jquery.nestable.css')}}">
@stop 
 @section('content')
<div class="jumbotron" data-pages="parallax">
    <div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner" style="transform: translateY(0px); opacity: 1;">

            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                <a href="{{url('/')}}">Accueil</a>
                </li>
                <li class="breadcrumb-item active">Sujets</li>
            </ol>

        </div>
    </div>
</div>


<div class=" container-fluid   container-fixed-lg">
      <!-- START card -->
      <div class="card card-transparent">
            <div class="card-body">
                <div class="row">
                        <div class="col-6">
    
                                <h3> Regions </h3> 
                            </div>
                            <div class="col-6">
            
                            </div>
                        
                            <table class="table table-striped" id="tableWithExportOptions">
                                    <thead>
                                        <tr>
                                            <td>#</td>
                                            <td>Nom de region</td>  
                                            <td>Supprimer</td>  
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        @foreach($regions as $region)
                                        <tr>
                                        <td>{{$region->id}}</td>
                                            <td><a href="{{url('regions/'.$region->id.'/sujets')}}">{{$region->name}}</a></td>
                                            <td> 
                                                <form action="{{url('regions/'.$region->id.'/subject//supprimer')}}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('POST') }}
                                                <button type="button" class="btn btn-transparent">
                                                    <i class="fa fa-trash fa-lg text-danger"></i>
                                                </button>
                                            </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>     
                </div>
           </div>
        </div>
    </div>
    
</div>

</div>
<!-- /.modal-dialog -->
</div>


<!-- /.modal-dialog -->
@endsection

