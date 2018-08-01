@extends('layouts.staff.app') @section('css') @stop @section('content')
<div class="jumbotron" data-pages="parallax">
    <div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner" style="transform: translateY(0px); opacity: 1;">
            <!-- START BREADCRUMB -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Partenaires</a>
                </li>
                <li class="breadcrumb-item active">{{$partner->company_name}}</li>
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
                    <h3>Partenaire Information</h3>
                    <div class="row">
                        <div class="col-md-4">
                            <h5>Nom de la compagnie:</h5>
                            <p>{{$partner->company_name}}</p>

                            <h5 class="p-t-15">Ice:</h5>
                            <p>{{$partner->ice}}</p>
                        </div>
                        <div class="col-md-4">
                            <h5>Registre du commerce:</h5>
                            <p>{{$partner->trade_registry}}</p>

                            <h5 class="p-t-15"> Taxe ID: </h5>
                            <p>{{$partner->tax_id}}</p>
                        </div>
                        <div class="col-md-4">
                            <img src="{{ asset('img/profiles/b2x.jpg') }}" alt="" srcset="" width="250">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h5>À propos:</h5>
                            <p>{{$partner->about}}</p>

                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <h5>Adresse:</h5>
                            <p>{{ $partner->address->address }} , {{ $partner->address->address_two }}</p>
                        </div>
                        <div class="col-md-4">
                            <h5>Pays:</h5>
                            <p>{{ $partner->address->country }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <h5>Ville:</h5>
                            <p>{{ $partner->address->city }}</p>
                        </div>
                        <div class="col-md-4">
                            <h5>Nom complet:</h5>
                            <p>{{ $partner->address->full_name }}</p>
                        </div>
                        <div class="col-md-4">
                            <h5>Code postal:</h5>
                            <p>{{ $partner->address->zip_code }}</p>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($partner->phones as $phones)
                        <div class="col-md-4">
                            @if ($phones->type == 'fix')

                            <h5>Téléphone:</h5>
                            <p>{{$phones->number }}</p>

                            @elseif ($phones->type == 'fax')

                            <h5>Fax:</h5>
                            <p>{{$phones->number }}</p>

                            @endif
                        </div>
                        @endforeach

                    </div>
                    <hr>
                    <h3>Partenaire Account</h3>
                    @foreach($partner->partnerAccounts as $partner_accounts)
                    <div class="row">
                        <div class="col-md-4">
                            <h5>Nom:</h5>
                            <p>{{ $partner_accounts->last_name }} </p>

                            <h5 class="p-t-15">Prénom</h5>
                            <p>{{ $partner_accounts->first_name }}</p>
                        </div>
                        <div class="col-md-4">
                            <h5>Email:</h5>
                            <p>{{ $partner_accounts->email }}</p>

                            <h5 class="p-t-15">Profession:</h5>
                            <p>-----</p>
                        </div>
                        <div class="col-md-4">
                            <img src="{{ asset('img/profiles/2x.jpg') }}" alt="" srcset="" width="250">
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-md-3 border-left">
                    <h3 class="v-align-middle">Approuver les partenaire</h3>

                    <div class="row">
                        <div class="col-md-4">
                            <form action="{{url('partners/'.$partner->id.'/status/approuver')}}" method="POST">
                                {{ csrf_field() }} {{ method_field('POST') }}
                                <button type="submit" class="btn btn-transparent text-primary">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                    Approuver
                                </button>
                            </form>
                        </div>

                        <div class="col-md-4">
                            <a href="{{url('partners/'.$partner->id.'/status/non-approuve')}}" class="btn btn-transparent text-danger">
                                <i class="fa fa-times" aria-hidden="true"></i>
                                Rejeter
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END card -->
</div>
<!-- END CONTAINER FLUID -->


@stop @section('script') @stop
