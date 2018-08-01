@extends('layouts.staff.app') @section('css') @stop @section('content')
<div class="jumbotron" data-pages="parallax">
    <div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner" style="transform: translateY(0px); opacity: 1;">
            <!-- START BREADCRUMB -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('sujets') }}">sujets</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ url('sujets/'.$topic.'/detail') }}">{{$title}}</a>
                </li>
                <li class="breadcrumb-item active">ajouter</li>
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
            <form class="form-horizontal" method="POST" action="{{ url('sujets/'.$topic.'/detail/ajouter') }}">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}
                <div class="row clearfix">
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }} form-group-default required" aria-required="true">
                            <label>Title</label>
                            <input type="text" class="form-control error" name="title" value="{{ old('title') }}" required autofocus aria-required="true"
                            aria-invalid="true">
                        </div>
                        @if ($errors->has('title'))
                        <label id="firstName-error" class="error" for="firstName">{{ $errors->first('title') }}</label>
                        @endif
                    </div>
                    <br>
                    <div class="row">
                    <div class="col-md-12">
                            <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }} form-group-default required" aria-required="true">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description" id="" cols="221" rows="10"></textarea>
                            </div>
                      
                        @if ($errors->has('description'))
                        <label id="firstName-error" class="error" for="firstName">{{ $errors->first('description') }}</label>
                        @endif
                    </div>
                </div>
                </div>
             <input type="hidden" name="topic" value="{{$topic}}">

                <div class="clearfix"></div>
                <button class="btn btn-primary" type="submit">Ajouter</button>
            </form>
        </div>
    </div>

</div>


<!-- END CONTAINER FLUID -->


@stop @section('script') @stop