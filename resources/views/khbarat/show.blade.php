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
                    <h4> Khbar </h4>
                    <hr>  
                    <div  class="row no-padding no-margin">
                        <div class="col-md-12 no-padding">
                                <div class="comment">
                                    <img src="{{ asset('img/social/cover.jpg') }}" class="img-fluid p-t-5 p-b-5" alt="" srcset="">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
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
                                </div> 
                                <hr>
                                <div class="comment"> 
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
           

                $.get("{{url('khbar/bulles')}}", function( data ) { 
         
                        
                          
                        var data = [ 
                            {lat: 41.878, lng: -87.629} ,
                            {lat: 40.714, lng: -74.005} , 
                            {lat: 34.052, lng: -118.243} , 
                            {lat: 49.25, lng: -123.1}
                           
                       ];
         
                       $.each(data, function( index, bubble ) {  
                         var cityCircle = new google.maps.Circle({
                             strokeColor: '#FF0000',
                             strokeOpacity: 0.8,
                             strokeWeight: 2,
                             fillColor: '#FF0000',
                             fillOpacity: 0.35,
                             map: map,
                             center: bubble,
                             radius: 120000
                           });
                                
                    });  
                       
            }); 
            
       
 }
    
        
 
    
 

</script>  
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXinhnpgReXMJ-SzB7STNPyNM1mrzyQ8w&callback=initMap" async
    defer></script>
@stop
