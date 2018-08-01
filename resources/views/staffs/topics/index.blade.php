
@extends('layouts.staff.app') @section('css') @stop @section('content')
<div class="jumbotron" data-pages="parallax">
    <div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner" style="transform: translateY(0px); opacity: 1;">
            <!-- START BREADCRUMB -->
            <ol class="breadcrumb">
               
                <li class="breadcrumb-item active">sujets</li>
            </ol>
            <!-- END BREADCRUMB -->
        </div>
    </div>
</div>
<!-- START CONTAINER FLUID -->
<div class=" container-fluid   container-fixed-lg bg-white">
    <!-- START card -->
    <div class="card card-transparent">
        <div class="card-body">
            <div class="row">
                <div class="col-6">

                    <h3>les sujets</h3> 
                </div>
                <div class="col-6">

                    <h3 class="text-right"><a href="{{url('sujets/ajouter')}}" >ajouter</a></h3>  
                </div>
                    
                        <table class="table table-striped" id="tableWithExportOptions">
                                <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>Titre du sujet</td>
                                        <td>Description du sujet</td>  
                                        <td>Modifer</td>  
                                        <td>Supprimer</td>  
                                    </tr>
                                </thead>
                                <tbody> 
                                    @foreach($topics as $topic)
                                    <tr>
                                        <td>{{$topic->id}}</td>
                                        <td><a href="{{url('sujets/'.$topic->id.'/detail')}}" > {{$topic->title}}</a></td>
                                        <td> {{$topic->description}}</td>
                                        <td> <a href="{{url('sujets/'.$topic->id.'/modifier')}}" class="btn btn-transparent"> <i class="fa fa-edit fa-lg"></i></a></td>
                                        <td> 
                                            <form action="{{url('sujets/'.$topic->id.'/supprimer')}}" method="POST">
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


<!-- END CONTAINER FLUID -->


@stop @section('script') @stop
