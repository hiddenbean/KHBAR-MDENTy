@extends('layouts.staff.app') @section('css') @stop @section('content')
<div class="jumbotron" data-pages="parallax">
    <div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner" style="transform: translateY(0px); opacity: 1;">
            <!-- START BREADCRUMB -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Partenaires</a>
                </li>
                <li class="breadcrumb-item active">Resons</li>
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
                <div class="col-md-9">
                    <h3>raison pourquoi ne pas approuver</h3>
                    <div class="row">
                            <form action="{{url('partners/'.$partner.'/status/créer')}}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('POST') }}
                                <input name="partner_id" value="{{$partner}}" type="hidden">
                                <table class="table table-striped" id="tableWithExportOptions">
                                        <thead>
                                            <tr>
                                                <td>#</td>
                                                <td>Reason Title</td>
                                                <td>Description</td>  
                                            </tr>
                                        </thead>
                                        <tbody> 
                                            @foreach($reasons as $reason)
                                           
                                            <tr class="odd gradeX">
                        
                                              
                                                <td> <input type="checkbox" name="reasons[]" value="{{$reason->id}}"></td>
                                                <td>{{$reason->title}}  </td>   
                                                <td>{{$reason->description}}  </td>   
                                          
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                            

                            
                    </div>
                </div>
                <div class="col-md-3 border-left">

                        <button type="submit" class="btn btn-primary btn-animated from-left btn-lg">
                                <span class="fa fa-check"></span>
                        </button>
                    </form>

                       
                </div>
            </div>
       </div>
    </div>
</div>


<!-- END CONTAINER FLUID -->


@stop @section('script') @stop
