@extends('layouts.app') 

@section('css')


@stop 

@section('body')
<div class="register-container full-height sm-p-t-30 register-staff-width" >
    <div class="d-flex justify-content-center flex-column full-height ">
        <div class="logo_text">{{ config('app.name', 'KHBAR MDINTy') }}</div>
        <h3>Connectez-vous à votre espace</h3>
        <div class="row">
            <div class="col-md-12">
                <form id="form-register" class="p-t-15" role="form" method="POST" action="{{ route('staff.login.submit') }}" novalidate="novalidate">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default input-group">
                                <div class="form-input-group {{ $errors->has('login') ? ' has-error' : '' }}">
                                    <label>Saisissez votre nom d&apos;utilisateur</label>
                                    <input type="login" name="login" value="{{ old('login') }}" required  class="form-control">
                                </div>
                                <div class="input-group-append ">
                                    <span class="input-group-text">@khbarmdenty.com
                                    </span>
                                </div> 
                            </div>
                              @if ($errors->has('login'))
                            <label for="login" class="error">{{ $errors->first('login') }}</label>
                            @endif
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default {{ $errors->has('password') ? ' has-error' : '' }}" >
                                <label>Mot de passe</label>
                                <input type="password" name="password" name="password" required class="form-control">
                                  @if ($errors->has('password'))
                                <label for="password" class="error">{{ $errors->first('password') }}</label>
                                 @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 no-padding sm-p-l-10">
                            <div class="checkbox check-success ">
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="checkbox1">Me tenir connecté</label>
                            </div>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="#" class="small">Mot de passe oublié</a> 
                        </div>
                    </div>
                    <button class="btn btn-primary btn-cons m-t-10" type="submit">Se connecter</button>
                </form>
            </div>
        </div>
    </div>
</div>





@stop 

@section('script') 

@stop
