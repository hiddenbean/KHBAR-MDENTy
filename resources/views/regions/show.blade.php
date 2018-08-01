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
                <li class="breadcrumb-item">
                    <a href="{{url('regions/sujets')}}">Sujets</a>
                </li>
                <li class="breadcrumb-item active">{{$region->name}}
                    </li>
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
    
                        <h3> Regions : {{$region->name}}</h3> 
                    </div>
                    <div class="col-6">
    
                        <h3 class="text-right"><a href="#" data-toggle="modal" data-target="#modalSlideUp" >Ajouter</a></h3>  
                    </div>
                        
                            <table class="table table-striped" id="tableWithExportOptions">
                                    <thead>
                                        <tr>
                                            <td>#</td>
                                            <td>Nom de topic</td>  
                                            <td>Nom de subject</td>  
                                            <td>description</td>  
                                            <td>Supprimer</td>  
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        @foreach($region->subjects as $subject)
                                        <tr>
                                            <td>{{$subject->id}}</td>
                                            <td>{{$subject->topic->title}}</td>
                                            <td>{{$subject->title}}</td>
                                            <td> {{$subject->description}}</td>
                                            <td> 
                                                <form action="{{url('regions/'.$region->id.'/subject/'.$subject->id.'/supprimer')}}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('POST') }}
                                                <button type="submit" class="btn btn-transparent">
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

{{-- <div class="modal fade slide-right" id="modalSlideLeft" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-sm">
    <div class="modal-content-wrapper">
        <div class="modal-content table-block">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i></button>
            <div class="modal-body v-align-middle text-center   ">
                    <form action="{{url('regions/'.$region->id.'/subject/ajouter')}}" method="POST" class="form-horizontal" >
                        {{ csrf_field() }}
                        {{ method_field('POST') }}
                    <input type="hidden" name="region" value="{{$region->id}}">
                       
                <br>
                <button type="submit" class="btn btn-primary btn-block">Continue</button>
                <button type="button" class="btn btn-default btn-block" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div> --}}
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<div class="modal fade slide-up disable-scroll" id="modalSlideUp" tabindex="-1" role="dialog" aria-labelledby="modalSlideUpLabel" aria-hidden="false">
    <div class="modal-dialog ">
        <div class="modal-content-wrapper">
        <div class="modal-content">
            <div class="modal-header clearfix text-left">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                  <i class="pg-close fs-14"></i>
                </button>
                <h5>Heading <span class="semi-bold">here</span></h5>
            </div>
            <div class="modal-body">
                    <form action="{{url('regions/'.$region->id.'/subject/ajouter')}}" method="POST" class="form-horizontal" >
                        {{ csrf_field() }}
                        {{ method_field('POST') }}
                    <input type="hidden" name="region" value="{{$region->id}}">
           
                                @foreach($topics as $topic)
                                <div class="dropdown">
                                        <a class=" btn btn-block dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                {{$topic->title}}
                                        </a>
                                      
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                @foreach($topic->subjects as $subject)
                                 
                                                <a class="dropdown-item" href="#" class="btn-block">
                                                    <input type="checkbox" name="subjects[]" value="{{$subject->id}}" id="{{$subject->id}}"  @if($subject->regions()->where('region_id',$region->id)->first()) checked  @endif >
                                                    {{$subject->title}}
                                                </a>
                                        @endforeach
                                        </div>
                                      </div>
                            @endforeach
                            <br>
                            <div class="modal-footer">
                                    ​
                                    <button type="submit" class="btn btn-primary btn-block">Continue</button>
                                    <button type="button" class="btn btn-default btn-block" data-dismiss="modal">Cancel</button>
                                            </div>
                            </form>
               
            </div>
        </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>

<!-- /.modal-dialog -->
@endsection
@section('script')
<script type="text/javascript" src="{{asset('plugins/jquery-nestable/jquery.nestable.js')}}"></script>
    <script>
        $(document).ready(function() {
            // Apply the plugin to the element
            $('#basic_example').nestable();
        });
</script>
@stop


