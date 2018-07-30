@extends('layouts.partner.app') @section('css') @stop @section('content')
<div class="map-container full-width full-height">
    <div id="google-map" class="full-width full-height"></div>
    <div data-pages="card" class="card card-default card-control-map" id="card-basic">
        <div class="card-body">
            <div class="scrollable">
                <div class="table-scrollable">
                    <h3> les régions </h3>
                    <hr>

                    <div class="row no-padding no-margin">
                        <div class="col-md-8 no-padding">
                            <div class="form-group m-b-10">
                                <input type="text" placeholder="Default input" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4 no-padding p-t-5 p-l-15">
                            <a href="#">
                                <i class="fa fa-plus"></i> Ajouter
                            </a>
                        </div>
                    </div>
                    <div class="row no-padding no-margin">
                        <div class="col-md-12 no-padding">

                            <table class="table table-condensed">
                                <thead>
                                    <th colspan="3">
                                        Name region
                                    </th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="col-md-5 v-align-middle">
                                            <a>
                                                <i class="fa fa-map-marker"></i>
                                            </a>
                                            <span class="m-l-10">lat: 22222.222222</span>
                                        </td>
                                        <td class="col-md-5 v-align-middle">
                                            <span class="m-l-10">lat: 22222.22222245454545</span>
                                        </td>
                                        <td width="30" class="v-align-middle">
                                            <a href="#" class="remove-item float-right">
                                                <i class="pg-close"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-5">
                                            <a>
                                                <i class="fa fa-map-marker"></i>
                                            </a>
                                            <span class="m-l-10">lat: 22222.222222</span>
                                        </td>
                                        <td class="col-md-5">
                                            <span class="m-l-10">lat: 22222.22222245454545</span>
                                        </td>
                                        <td width="30">
                                            <a href="#" class="remove-item float-right">
                                                <i class="pg-close"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-5">
                                            <a>
                                                <i class="fa fa-map-marker"></i>
                                            </a>
                                            <span class="m-l-10">lat: 22222.222222</span>
                                        </td>
                                        <td class="col-md-5">
                                            <span class="m-l-10">lat: 22222.22222245454545</span>
                                        </td>
                                        <td width="30">
                                            <a href="#" class="remove-item float-right">
                                                <i class="pg-close"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-5">
                                            <a>
                                                <i class="fa fa-map-marker"></i>
                                            </a>
                                            <span class="m-l-10">lat: 22222.222222</span>
                                        </td>
                                        <td class="col-md-5">
                                            <span class="m-l-10">lat: 22222.22222245454545</span>
                                        </td>
                                        <td width="30">
                                            <a href="#" class="remove-item float-right">
                                                <i class="pg-close"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-5">
                                            <a>
                                                <i class="fa fa-map-marker"></i>
                                            </a>
                                            <span class="m-l-10">lat: 22222.222222</span>
                                        </td>
                                        <td class="col-md-5">
                                            <span class="m-l-10">lat: 22222.22222245454545</span>
                                        </td>
                                        <td width="30">
                                            <a href="#" class="remove-item float-right">
                                                <i class="pg-close"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-5">
                                            <a>
                                                <i class="fa fa-map-marker"></i>
                                            </a>
                                            <span class="m-l-10">lat: 22222.222222</span>
                                        </td>
                                        <td class="col-md-5">
                                            <span class="m-l-10">lat: 22222.22222245454545</span>
                                        </td>
                                        <td width="30">
                                            <a href="#" class="remove-item float-right">
                                                <i class="pg-close"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <button class="btn btn-primary float-right m-t-10">
                                Terminer
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection 

@section('script')
<script>
    var map;
    var markers = [];
    var longlat = [];
    var polygone = [];
    var bermudaTriangle;

    function initMap() {
        var mapOptions = {
            zoom: 8,
            disableDefaultUI: true,
            center: {
                lat: 33.927382,
                lng: -6.900029
            },
            styles: [{
                featureType: 'water',
                elementType: 'all',
                stylers: [{
                    hue: '#e9ebed'
                }, {
                    saturation: -78
                }, {
                    lightness: 67
                }, {
                    visibility: 'simplified'
                }]
            }, {
                featureType: 'landscape',
                elementType: 'all',
                stylers: [{
                    hue: '#ffffff'
                }, {
                    saturation: -100
                }, {
                    lightness: 100
                }, {
                    visibility: 'simplified'
                }]
            }, {
                featureType: 'road',
                elementType: 'geometry',
                stylers: [{
                    hue: '#bbc0c4'
                }, {
                    saturation: -93
                }, {
                    lightness: 31
                }, {
                    visibility: 'simplified'
                }]
            }, {
                featureType: 'poi',
                elementType: 'all',
                stylers: [{
                    hue: '#ffffff'
                }, {
                    saturation: -100
                }, {
                    lightness: 100
                }, {
                    visibility: 'off'
                }]
            }, {
                featureType: 'road.local',
                elementType: 'geometry',
                stylers: [{
                    hue: '#e9ebed'
                }, {
                    saturation: -90
                }, {
                    lightness: -8
                }, {
                    visibility: 'simplified'
                }]
            }, {
                featureType: 'transit',
                elementType: 'all',
                stylers: [{
                    hue: '#e9ebed'
                }, {
                    saturation: 10
                }, {
                    lightness: 69
                }, {
                    visibility: 'on'
                }]
            }, {
                featureType: 'administrative.locality',
                elementType: 'all',
                stylers: [{
                    hue: '#2c2e33'
                }, {
                    saturation: 7
                }, {
                    lightness: 19
                }, {
                    visibility: 'on'
                }]
            }, {
                featureType: 'road',
                elementType: 'labels',
                stylers: [{
                    hue: '#bbc0c4'
                }, {
                    saturation: -93
                }, {
                    lightness: 31
                }, {
                    visibility: 'on'
                }]
            }, {
                featureType: 'road.arterial',
                elementType: 'labels',
                stylers: [{
                    hue: '#bbc0c4'
                }, {
                    saturation: -93
                }, {
                    lightness: -2
                }, {
                    visibility: 'simplified'
                }]
            }]
        };

        map = new google.maps.Map(document.getElementById('google-map'), mapOptions);
        // This event listener calls addMarker() when the map is clicked.
        google.maps.event.addListener(map, 'click', function (event) {
            longlat.push({
                lat: event.latLng.lat(),
                lng: event.latLng.lng()
            });
            console.log(event.latLng.lat() + ',' + event.latLng.lng());
            clearPolygone();
            setMapOnAll(map, longlat);
            var region_point = document.createElement('input');
            region_point.type = 'text';
            region_point.name = 'region_points[]';
            region_point.value = event.latLng.lat() + ',' + event.latLng.lng();
            var div = document.getElementById('region');
            div.append(region_point);
        });
    }

    // Sets the map on all markers in the array.
    function setMapOnAll(map, longlat) {
        if (map) {
            bermudaTriangle = new google.maps.Polygon({
                editable: true,
                paths: longlat,
                strokeColor: '#FF0000',
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: '#FF0000',
                fillOpacity: 0.35
            });
            bermudaTriangle.setMap(map);
            polygone.push(bermudaTriangle);
            google.maps.event.addListener(bermudaTriangle, 'rightclick', function (event) {
                console.log(event.vertex);
                if (event.vertex == undefined) {
                    return;
                } else {
                    removeVertex(event.vertex);
                    longlat.splice(event.vertex, event.vertex);
                }
            });
        } else {
            if (polygone[0]) {
                polygone[0].setMap(null);
            }
        }
    }

    function clearPolygone() {
        setMapOnAll(null, longlat);
        polygone = [];
    }

    function removeVertex(vertex) {
        var path = bermudaTriangle.getPath();

        path.removeAt(vertex);
    }

</script>
<script>
    function submit() {

        for (var i = 0; i < longlat.length; i++) {
            var region_point = document.createElement('input');
            region_point.type = 'text';
            region_point.name = 'region_points[]';
            region_point.value = event.latLng.lat() + ',' + event.latLng.lng();
            var div = document.getElementById('region');
            div.append(region_point);
        }
        //document.getElementById("form").submit(); 
    }

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXinhnpgReXMJ-SzB7STNPyNM1mrzyQ8w&callback=initMap" async
    defer></script>
@stop
