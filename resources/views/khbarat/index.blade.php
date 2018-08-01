@extends('layouts.partner.app') 
@section('css') 

@stop 

@section('content')

<div class=" container-fluid container-fixed-lg p-t-50">
 
    <!-- START card -->
    <div class="row">
        <div class="col-lg-2 no-padding">
            <div class="p-r-30">

            </div>
        </div>
        <div class="col-lg-6 sm-no-padding">
            
            @foreach ($khbarat as $khbar) 
                <a href="" class="text-black">
                    <div id="card-advance" class="card card-default">
                        <div class="card-body"> 
                            <h4> 
                                <i class="fa fa-book"></i> 
                                {{ $khbar->  }}
                            </h4>
                            <h5><strong>We have crafted Pages Cards to suit any . Add a maximize button</strong></h5>
                            <small class="badge "> <i class="fa fa-map-marker" ></i> 123  rue du Faubourg National</small> <small> <i class="fa fa-calendar"></i> 01/08/2018</small> 
                        <hr> 
                        <div class="comment-up">
                                <img src="{{ asset('img/social/cover.jpg') }}" class="img-fluid p-t-5 p-b-5" alt="" srcset="">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia dolore repellendus recusandae eum nemo eius, corrupti, labore numquam facere necessitatibus aperiam est ad cumque ea repudiandae obcaecati quis ipsum debitis?</p>
                                <div class="profile-img-wrapper m-t-5 inline">
                                    <img width="35" height="35" data-src-retina="{{ asset('img/profiles/avatar_small2x.jpg') }}" data-src="{{ asset('img/profiles/avatar_small.jpg') }}"
                                        alt="" src="{{ asset('img/profiles/avatar_small.jpg') }}">
                                    <div class="chat-status available">
                                    </div>
                                </div>
                                <div class="inline m-l-10">
                                    <p class="small hint-text m-t-5">Name  <br>
                                        Lorem ipsum dolor sit amet consectetur 
                                    </p>
                                </div>
                                <span class="badge badge-primary float-right m-t-15"> 1245+</span>
                            </div> 
                            <hr>
                            <div class="text-center">
                                <a href="#"><i class="fa fa-comments"></i>  Voir tout les comment(522)</a>
                            </div>
                            
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="col-lg-4 no-padding">

        </div>
    </div>
    <!-- END card -->
</div>

@endsection 

@section('script') @stop
