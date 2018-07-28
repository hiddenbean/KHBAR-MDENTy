@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('partner.register.submit') }}" aria-label="{{ __('Register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group @if($errors->get('path')) has-error @endif">
                            <input type="file" name="path" class="form-control" value="{{ old('path') }}">
                            @if($errors->get('path'))
                                @foreach($errors->get('path') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            @endif
                        </div>
                        <div class="form-group row">
                            <label for="company_name" class="col-md-4 col-form-label text-md-right">Company Name</label>

                            <div class="col-md-6">
                                <input id="company_name" type="text" class="form-control{{ $errors->has('company_name') ? ' is-invalid' : '' }}" name="company_name" value="hidden bean" required autofocus>

                                @if ($errors->has('company_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('company_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="hidden" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="about" class="col-md-4 col-form-label text-md-right">About</label>

                            <div class="col-md-6">
                                <input id="about" type="text" class="form-control{{ $errors->has('about') ? ' is-invalid' : '' }}" name="about" value="test" required autofocus>

                                @if ($errors->has('about'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('about') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="trade_registry" class="col-md-4 col-form-label text-md-right">Trade Registry</label>

                            <div class="col-md-6">
                                <input id="trade_registry" type="text" class="form-control{{ $errors->has('trade_registry') ? ' is-invalid' : '' }}" name="trade_registry" value="1324544672356" required autofocus>

                                @if ($errors->has('trade_registry'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('trade_registry') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ice" class="col-md-4 col-form-label text-md-right">Ice</label>

                            <div class="col-md-6">
                                <input id="ice" type="text" class="form-control{{ $errors->has('ice') ? ' is-invalid' : '' }}" name="ice" value="1654157827903" required autofocus>

                                @if ($errors->has('ice'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ice') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tax_id" class="col-md-4 col-form-label text-md-right">Taxe Id</label>

                            <div class="col-md-6">
                                <input id="tax_id" type="text" class="form-control{{ $errors->has('tax_id') ? ' is-invalid' : '' }}" name="tax_id" value="243567" required autofocus>

                                @if ($errors->has('tax_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tax_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">First Name</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="Ayoub" required autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">Last Name</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="moum" required autofocus>

                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="a@d.d" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="hello" required>

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address_two" class="col-md-4 col-form-label text-md-right">Address two</label>

                            <div class="col-md-6">
                                <input id="address_two" type="text" class="form-control{{ $errors->has('address_two') ? ' is-invalid' : '' }}" name="address_two" value="there" required>

                                @if ($errors->has('address_two'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address_two') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">country</label>

                            <div class="col-md-6">
                                <input id="country" type="text" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="maroc" required>

                                @if ($errors->has('country'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">city</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="temara" required>

                                @if ($errors->has('city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="zip_code" class="col-md-4 col-form-label text-md-right">zip_code</label>

                            <div class="col-md-6">
                                <input id="zip_code" type="text" class="form-control{{ $errors->has('zip_code') ? ' is-invalid' : '' }}" name="zip_code" value="12000" required>

                                @if ($errors->has('zip_code'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('zip_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="full_name" class="col-md-4 col-form-label text-md-right">full_name</label>

                            <div class="col-md-6">
                                <input id="full_name" type="text" class="form-control{{ $errors->has('full_name') ? ' is-invalid' : '' }}" name="full_name" value="HH" required>

                                @if ($errors->has('full_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('full_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <input id="longitude" type="hidden" class="form-control{{ $errors->has('longitude') ? ' is-invalid' : '' }}" name="longitude" value="12.23445" required>

                        <input id="latitude" type="hidden" class="form-control{{ $errors->has('latitude') ? ' is-invalid' : '' }}" name="latitude" value="123.324356" required>
                        
                        <div class="form-group row">
                            <label for="zone" class="col-md-4 col-form-label text-md-right">zone name   </label>

                            <div class="col-md-6">
                                <input id="zone" type="text" class="form-control{{ $errors->has('zone') ? ' is-invalid' : '' }}" name="zone" value="zone11" required>

                                @if ($errors->has('zone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('zone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div id="map" style="height:500px; width:100%;"></div>
                        <div id="longlat"></div>
                        <div class="form-group row">
                            <label for="number" class="col-md-4 col-form-label text-md-right">number</label>
                            <div class='row'>
                                <div class="col-md-4">
                                    <select name="code_country[]" id="">
                                        <option value="1">123</option>
                                        <option value="2">123</option>
                                    </select>
                                </div>
                                <div class="col-md-8">
                                    <input id="number" type="text" class="form-control{{ $errors->has('number') ? ' is-invalid' : '' }}" name="number[]" value="0654345679" required>
    
                                    @if ($errors->has('number'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('number') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="number" class="col-md-4 col-form-label text-md-right">number 2</label>
                            <div class='row'>
                                <div class="col-md-4">
                                    <select name="code_country[]" id="">
                                        <option value="1">123</option>
                                        <option value="2">123</option>
                                    </select>
                                </div>
                                <div class="col-md-8">
                                    <input id="number" type="text" class="form-control{{ $errors->has('number') ? ' is-invalid' : '' }}" name="number[]" value="098765432345" required>

                                    @if ($errors->has('number'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('number') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fax_number" class="col-md-4 col-form-label text-md-right">fax_number</label>

                            <div class='row'>
                                <div class="col-md-4">
                                    <select name="code_country[]" id="">
                                        <option value="1">123</option>
                                        <option value="2">123</option>
                                    </select>
                                </div>
                                <div class="col-md-8">
                                    <input id="fax_number" type="text" class="form-control{{ $errors->has('fax_number') ? ' is-invalid' : '' }}" name="fax_number" value="098765432" required>

                                    @if ($errors->has('fax_number'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('fax_number') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    <script>
        var geocoder;
        var map;
        var markers = [];
        var longlat = [];
        var polygone = [];

        function initMap() {
            geocoder = new google.maps.Geocoder();
            map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 33.927382, lng: -6.900029},
            zoom: 8
            });
            // This event listener calls addMarker() when the map is clicked.
            google.maps.event.addListener(map, 'click', function(event) {
            longlat.push({lat : event.latLng.lat(), lng : event.latLng.lng()});
            clearPolygone();
            setMapOnAll(map, longlat);
            var region_point = document.createElement('input');
            region_point.type = 'text';
            region_point.name = 'region_points[]';
            region_point.value = event.latLng.lat()+','+event.latLng.lng();
            var div = document.getElementById('longlat');
            div.append(region_point);
        });
        }
        
        // Sets the map on all markers in the array.
        function setMapOnAll(map, longlat) {
            if(map)
            {
                    bermudaTriangle = new google.maps.Polygon({
                    paths: longlat,
                    strokeColor: '#FF0000',
                    strokeOpacity: 0.8,
                    strokeWeight: 2,
                    fillColor: '#FF0000',
                    fillOpacity: 0.35
                });
                bermudaTriangle.setMap(map);
                polygone.push(bermudaTriangle);
                bermudaTriangle = null;
            }
            else
            {
                console.log(polygone[0]);
                if(polygone[0])
                {
                    polygone[0].setMap(null);
                }
            }
        }

        function clearMarkers() {
            setMapOnAll(null, longlat);
            markers = [];
        }

        function clearPolygone() {
            setMapOnAll(null, longlat);
            polygone = [];
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXinhnpgReXMJ-SzB7STNPyNM1mrzyQ8w&callback=initMap" async defer></script>
@endsection
