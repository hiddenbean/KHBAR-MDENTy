@extends('layouts.partner.app') 
@section('css') 

@stop 

@section('body')

<div class="login-wrapper ">
    <!-- START Login Background Pic Wrapper-->
    <div class="bg-pic">
        <!-- START Background Pic-->
        <img src="{{ asset('img/demo/bg_login_partner.jpg') }}" data-src="{{ asset('img/demo/bg_login_partner.jpg') }}" data-src-retina="{{ asset('img/demo/bg_login_partner.jpg') }}"
            alt="" class="lazy">
        <!-- END Background Pic-->
        <!-- START Background Caption-->
        <div class="bg-caption pull-bottom sm-pull-bottom text-white p-l-20 m-b-20">
            <h2 class="semi-bold text-white">
                Pages make it easy to enjoy what matters the most in the life</h2>
            <p class="small">
                images Displayed are solely for representation purposes only, All work copyright of respective owner, otherwise © 2013-2014
                REVOX.
            </p>
        </div>
        <!-- END Background Caption-->
    </div>
    <!-- END Login Background Pic Wrapper-->
    <!-- START Login Right Container-->
    <div class="login-container bg-white">
        <div class="p-l-50 m-l-20 p-r-50 m-r-20 p-t-50 m-t-30 sm-p-l-15 sm-p-r-15 sm-p-t-40">
            <div class="logo_text"> KHBAR MDINTy </div>
            <p>Connectez-vous à votre espace
                <strong>{{-- $partner->company_name --}}.khbarmdenty.com</strong>
            </p>
            <!-- START Login Form -->
            <form class="p-t-15" role="form" action="{{ url('/seconnecter') }}" method="POST">
                <!--  Generate hidden input for token -->
                {{ csrf_field() }}

                <!-- START Form Control-->
                <div class="form-group form-group-default">
                    <label> Identifiant </label>
                    <div class="controls">
                        <input type="text" name="login" placeholder="Saisissez votre nom d'utilisateur ou votre e-mail" class="form-control">
                    </div>
                </div>
                <label class='error' for='login'></label>
                @if ($errors->has('login'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('login') }}</strong>
                    </span>
                @endif

                <!-- END Form Control-->
                <!-- START Form Control-->
                <div class="form-group form-group-default">
                    <label> Mot de passe </label>
                    <div class="controls">
                        <input type="password" class="form-control" name="password" placeholder="Saisissez votre mot de passe">
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <label class='error' for='password'></label>

                <!-- START Form Control-->
                <div class="row">
                    <div class="col-md-6 no-padding sm-p-l-10">
                        <div class="checkbox ">
                            <input type="checkbox" value="1" id="checkbox1" name="remember">
                            <label for="checkbox1">Me tenir connecté</label>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="#" class="small">Aidez-moi ?</a>
                        <br>
                        <a href="#" class="small">Contacter l&apos;assistance</a>
                    </div>
                </div>
                <!-- END Form Control-->
                <button class="btn btn-primary btn-cons m-t-10" type="submit">Se connecter</button>
            </form>
            <!--END Login Form-->

            <!--END Login Form-->
            <div class="pull-bottom sm-pull-bottom">
                <div class="m-b-30 p-r-80 sm-m-t-20 sm-p-r-15 sm-p-b-20 clearfix">
                    <div class="col-sm-12">
                        <p>
                            <small class="m-r-10">
                                <a href="#">
                                    Informations légales .
                                </a>
                            </small>
                            <small class="m-r-10">
                                <a href="#"> Conditions agrément. </a>
                            </small>
                            <small class="m-r-10">
                                <a href="#"> © Hiddenbean 2018. </a>
                            </small>
                        </p>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <!-- END Login Right Container-->
</div>

@stop 

@section('script') 

@stop
