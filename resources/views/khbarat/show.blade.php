@extends('layouts.partner.map') 

@section('css') 

@stop 

@section('content')
<div class="map-container full-width full-height">
    <div id="google-map"  class="full-width full-height">

    </div>
    <div data-pages="card" class="card card-default card-control-map" id="card-basic">
        <div class="card-body">
            <div class="scrollable">
                <div class="card-scrollable">
                    <h6><big> Les déches <b>   Harhoura, Plage de Témara</b> </big></h6>

                    <hr>  
                    <div  class="row no-padding no-margin">
                        <div class="col-md-12 no-padding">
                                <div class="comment">
                                    <img src="{{ asset('img/beach.jpg') }}" class="img-fluid p-t-5 p-b-5" alt="" srcset="">
                                    <p>Daro vraiment un bon travail, BRAVO !</p>
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
                                        <img width="35" height="35" data-src-retina="{{ asset('img/profiles/a2x.jpg') }}" data-src="{{ asset('img/profiles/a2x.jpg') }}"
                                            alt="" src="{{ asset('img/profiles/a2x.jpg') }}">
                                        <div class="chat-status available">
                                        </div>
                                    </div>
                                    <div class="inline m-l-10">
                                        <p class="small hint-text m-t-5">Hossam  <br>
                                            Lorem ipsum dolor sit amet consectetur 
                                        </p>
                                    </div> 
                                </div> 
                                <hr>
                                <div class="comment"> 
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia dolore repellendus recusandae eum nemo eius, corrupti, labore numquam facere necessitatibus aperiam est ad cumque ea repudiandae obcaecati quis ipsum debitis?</p>
                                    <div class="profile-img-wrapper m-t-5 inline">
                                        <img width="35" height="35" data-src-retina="{{ asset('img/profiles/4x.jpg') }}" data-src="{{ asset('img/profiles/4x.jpg') }}"
                                            alt="" src="{{ asset('img/profiles/4x.jpg') }}">
                                        <div class="chat-status available">
                                        </div>
                                    </div>
                                    <div class="inline m-l-10">
                                        <p class="small hint-text m-t-5">Adam  <br>
                                            Lorem ipsum dolor sit amet consectetur 
                                        </p>
                                    </div> 
                                </div> 

                                    <hr>
                                <div class="comment"> 
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia dolore repellendus recusandae eum nemo eius, corrupti, labore numquam facere necessitatibus aperiam est ad cumque ea repudiandae obcaecati quis ipsum debitis?</p>
                                    <div class="profile-img-wrapper m-t-5 inline">
                                        <img width="35" height="35" data-src-retina="{{ asset('img/profiles/2x.jpg') }}" data-src="{{ asset('img/profiles/2x.jpg') }}"
                                            alt="" src="{{ asset('img/profiles/2x.jpg') }}">
                                        <div class="chat-status available">
                                        </div>
                                    </div>
                                    <div class="inline m-l-10">
                                        <p class="small hint-text m-t-5">Hassan  <br>
                                            Lorem ipsum dolor sit amet consectetur 
                                        </p>
                                    </div> 
                                </div>
                                <hr>
                                <div class="comment">
                                        <img src="{{ asset('img/social/cover.jpg') }}" class="img-fluid p-t-5 p-b-5" alt="" srcset="">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                        <div class="profile-img-wrapper m-t-5 inline">
                                            <img width="35" height="35" data-src-retina="{{ asset('img/profiles/d2x.jpg') }}" data-src="{{ asset('img/profiles/d2x.jpg') }}"
                                                alt="" src="{{ asset('img/profiles/d2x.jpg') }}">
                                            <div class="chat-status available">
                                            </div>
                                        </div>
                                        <div class="inline m-l-10">
                                            <p class="small hint-text m-t-5">Nisrin  <br>
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
                zoom: 16,
                disableDefaultUI: true,
                center: {
                    lat: 33.93385421979, lng: -6.9453698104805
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
           
           
            var Circle = new google.maps.Circle({
                strokeColor: '#674afb',
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: '#3e2f8b',
                fillOpacity: 0.8,
                map: map,
                center: {lat:33.933498157907, lng: -6.9448548263497},
                radius: 100
                });
            var citymap = {
                chicago: {
                    center: {lat: 	33.93385421979, lng: -6.9453698104805},
                    population: 2714856
                },

                chicago1: {
                    center: {lat: 	33.932738866557, lng: -6.9444791340757},
                    population: 2714856
                },

                chicago2: {
                    center: {lat: 	33.932471816787, lng: -6.9451657795835},
                    population: 2714856
                },

                chicago3: {
                    center: {lat: 	33.93268545667, lng: -6.9456700348783},
                    population: 2714856
                },

                chicago4: {
                    center: {lat: 		33.932057887989, lng: -6.9455627465177},
                    population: 2714856
                },

                chicago5: {
                    center: {lat: 		33.931919911276, lng: -6.944897558682},
                    population: 2714856
                },
                
                chicago6: {
                    center: {lat: 		33.932044535413 , lng: -6.944173362248},
                    population: 2714856
                },

                chicago7: {
                    center: {lat: 		33.931942165599, lng: -6.9437012934613},
                    population: 2714856
                },
                
                losangeles: {
                    center: {lat: 33.933106488117 , lng: -6.9452839797921},
                    population: 3857799
                },
                vancouver: {
                    center: {lat: 33.933070881683, lng: -6.9446402496285},
                    population: 603502
                }
            };
            for (var city in citymap) {
                // Add the circle for this city to the map.
                var cityCircle = new google.maps.Circle({
                strokeColor: '#FF0000',
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: '#FF0000',
                fillOpacity: 0.35,
                map: map,
                center: citymap[city].center,
                radius: 100
                });
            }

             
       
 }
    
         
</script>  
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXinhnpgReXMJ-SzB7STNPyNM1mrzyQ8w&callback=initMap" async
    defer></script>
@stop
