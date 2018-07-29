@extends('layouts.partner.app') 
@section('css') @stop 

@section('body')

<div class="register-container full-height sm-p-t-30">
    <div class="d-flex justify-content-center flex-column full-height ">
        <div class="logo_text"> KHBAR MDINTy</div> 
        <h3>Connectez-vous à votre espace </h3> 
        <form id="form-register" class="p-t-15" role="form" action="index.html">

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group form-group-default input-group">
                        <div class="form-input-group">
                            <label>Entrez le nom de votre espace.</label>
                            <input type="name" class="form-control">
                        </div>
                        <div class="input-group-append ">
                            <span class="input-group-text">.khbarmdenty.com
                            </span>
                        </div>
                    </div>
                    <label class='error' for='name'></label>
                </div>
            </div>
            <button class="btn btn-primary btn-cons m-t-10" type="submit">Continuer &nbsp; <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
            <p class="m-t-10">
                <small>
                    <strong>
                        <a href="#">
                            Devenir un partenaire de KHBAR MDINTy.
                        </a>
                    </strong> 
                </small>
            </p>
        </form>
    </div>
</div>
<div class=" full-width">
    <div class="register-container m-b-10 clearfix">
        <div class="m-b-30 sm-m-t-20 sm-p-r-15 sm-p-b-20 clearfix d-flex-md-up">
            <div class="col-md-2 no-padding d-flex align-items-center">
                <img src="{{asset('img/demo/pages_icon.png')}}" alt="" class="" data-src="{{asset('img/demo/pages_icon.png')}}" data-src-retina="{{asset('img/demo/pages_icon_2x.png')}} "
                    width="60" height="60">
            </div>
            <div class="col-md-9 no-padding d-flex align-items-center">
                <p class="hinted-text small inline sm-p-t-10">No part of this website or any of its contents may be reproduced, copied, modified or adapted, without the
                    prior written consent of the author, unless otherwise indicated for stand-alone materials.</p>
            </div>
        </div>
    </div>
</div>

@stop 

@section('script') @stop
