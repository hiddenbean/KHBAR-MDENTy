@extends('layouts.partner.map') 

@section('css') 

@stop 

@section('content')
<div class="map-container full-width full-height">
    <div id="google-map" class="full-width full-height"></div>
    <div data-pages="card" class="card card-default card-control-map" id="card-basic">
        <div class="card-body">
            <div class="scrollable">
                <div class="card-scrollable">
                    <h4> les régions </h4>
                    <hr>  
                    <div  class="row no-padding no-margin">
                        <div class="col-md-12 no-padding">
                            <div id="container_create_region"> 
                                @include('regions.shows.regions') 
                            </div>
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
        var longlat = [];
        var polygone = [];
        var triangle;
        var geocoder;
        var address;
        function initMap() {
            var mapOptions = {
                zoom: 8,
                disableDefaultUI: true,
                center: {
                    lat: 33.927382,
                    lng: -6.900029
                },
                styles: [
                    {
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
                }
                ]
            };
    
            map = new google.maps.Map(document.getElementById('google-map'), mapOptions); 
            geocoder = new google.maps.Geocoder;
            google.maps.event.addListener(map, 'click', function (event) {
               
               var name_region = $('#name_region').val(); 
               if(name_region){
                    longlat.push({
                        lat: event.latLng.lat(),
                        lng: event.latLng.lng()
                    }); 
                    clearPolygone();
                    setMapOnAll(map, longlat);
                    var region_point = document.createElement('input');
                    region_point.type = 'text';
                    region_point.name = 'region_points[]';
                    region_point.value = event.latLng.lat() + ',' + event.latLng.lng();
                    var div = document.getElementById('region');
                    div.append(region_point); 
                    pointsTable(event,map,geocoder, address);
               }
    
            }); 


            $.get("{{url('regions/points')}}", function( data ) { 
                $.each(data, function( index, value ) { 
                   
                    var longlat = [ ];
                // if (value['points']==Null) {
                //     return;
                // }
                    for(var i=0; i < value['points'].length ; i++ ){
                        var longlatpoint = {
                            'lat': value['points'][i]['longitude'],
                            'lng': value['points'][i]['latitude']
                        } 
                        longlat.push(longlatpoint);
                    } 
                
                        // Construct the polygon.
                        var trianglePoints = new google.maps.Polygon({
                            paths: longlat,
                            strokeColor: '#FF0000',
                            strokeOpacity: 0.8,
                            strokeWeight: 2,
                            fillColor: '#FF0000',
                            fillOpacity: 0.35
                        });
                        trianglePoints.setMap(map);
                           
                }); 
              }); 
    
        } 
    
    
        // Sets the map on all markers in the array.
        function setMapOnAll(map, longlat) {
            if (map) {
                triangle = new google.maps.Polygon({
                    editable: true,
                    paths: longlat,
                    strokeColor: '#FF0000',
                    strokeOpacity: 0.8,
                    strokeWeight: 2,
                    fillColor: '#FF0000',
                    fillOpacity: 0.35
                });
                triangle.setMap(map);
                polygone.push(triangle); 
                google.maps.event.addListener(triangle, 'rightclick', function (event) {
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
            var path = triangle.getPath();
            path.removeAt(vertex);
        }
      
        function pointsTable(event,map,geocoder) {  
              var latlng = {lat: parseFloat(event.latLng.lat()), lng: parseFloat(event.latLng.lng())};
                geocoder.geocode({'location': latlng}, function(results, status) {
                if (status === 'OK') {
                    if (results[0]) {
                        
                        var points =`<tr>
                        <td class="v-align-middle no-padding" width="5%">
                            <i class="fa fa-map-marker"></i>
                                </td>
                                <td class="v-align-middle padding-5" width="85%">` 
                                        +results[0].formatted_address+
                                `</td>
                            </tr>`; 
                    var table_points = document.getElementById('table_points');  
                    table_points.innerHTML += points;
    
                    } else {
                    window.alert('No results found');
                    }
                } else {
                    window.alert('Geocoder failed due to: ' + status);
                }
           }); 
        }
 
    
 

</script>  
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXinhnpgReXMJ-SzB7STNPyNM1mrzyQ8w&callback=initMap" async
    defer></script>
@stop
