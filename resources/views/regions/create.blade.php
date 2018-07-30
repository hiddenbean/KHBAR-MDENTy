<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div id="map" style="width:500px;height:500px"></div>
    <form action="{{ url('') }}" method="post" id="form">
        <div id="region"></div>
        <button type="button" id="submit" onclick="submit()">ajouter la region</button>
    </form>
    

    <script>
        var geocoder;
        var map;
        var markers = [];
        var longlat = [];
        var polygone = [];
        var bermudaTriangle;

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
        });
        }
        
        // Sets the map on all markers in the array.
        function setMapOnAll(map, longlat) {
            if(map)
            {
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
                google.maps.event.addListener(bermudaTriangle, 'rightclick', function(event) {
                    console.log(event.vertex);
                    if (event.vertex == undefined) {
                      return;
                    } else {
                      removeVertex(event.vertex);
                      longlat.splice(event.vertex, event.vertex);
                    }
                  });
            }
            else
            {
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

        function removeVertex(vertex) {
            var path = bermudaTriangle.getPath();

            path.removeAt(vertex);
          }
    </script>
    <script>
        function submit(){

            for(var i=0; i<longlat.length; i++)
            {
                var region_point = document.createElement('input');
                region_point.type = 'text';
                region_point.name = 'region_points[]';
                region_point.value = event.latLng.lat()+','+event.latLng.lng();
                var div = document.getElementById('region');
                div.append(region_point);
            }
            //document.getElementById("form").submit(); 
        });
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXinhnpgReXMJ-SzB7STNPyNM1mrzyQ8w&callback=initMap" async defer></script>
</body>
</html>
