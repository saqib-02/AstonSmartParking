<!DOCTYPE html>
<html>
<head>
    <title>Book Parking</title>
    <?php include('Header.php');?> 
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<section id="Welcome">
    <div class="banner">
        <div class="wrapper">
            <h1>Car Parks Near You</h1>
        </div>
    </div>
</section>

<div id="map"></div>

<input id="searchinput" type="text" placeholder="Enter Destination">

<!-- footer-->
<?php include('Footer.php');?>



<!-- ref- google documentation - https://developers.google.com/maps/documentation/javascript 
                                 https://developers.google.com/maps/documentation/places/web-service 
                                https://developers.google.com/maps/documentation/geocoding/
 -->

 <script>
var markers = [];
var map;
var searchBox;
var destinationMarker;

// Variables to store parking markers, the map, searchbox, and the destination marker
// loads map if destination is valid and if not then an alert is sent stating destination cannot be found.
function initMap() {
    var destination = "<?php echo isset($_SESSION['destination']) ? $_SESSION['destination'] : ''; ?>";
    var geocoder = new google.maps.Geocoder();
    
    
    function addParkingMarkers(location) {
        var request = {
            location: location,
            radius: '500',
            type: ['parking'] // looks for car park within 500 metres 
        };
        // if car parks are found then the carparks are shown with a marker
        var service = new google.maps.places.PlacesService(map);
        service.nearbySearch(request, function(results, status) {
            if (status === 'OK') {
                markers.forEach(function(marker) {
                    marker.setMap(null);
                });
                markers = [];

        
                for (var i = 0; i < results.length; i++) {
                    createMarker(results[i]);
                }
            }
        });
    }
    // red marker to show destination on the map 
    function createOrUpdateDestinationMarker(position) {
        if (!destinationMarker) {
            destinationMarker = new google.maps.Marker({
                map: map,
                position: position
            });
        } else {
            destinationMarker.setPosition(position);
        }
    }

    // Function to load the default map with the default location
    function DefaultLocationMap() {
        var defaultLocationString = "Default Location, London, UK"; 
        geocoder.geocode({ 'address': defaultLocationString }, function(results, status) {
            if (status === 'OK') {
                var defaultLocation = results[0].geometry.location;

                map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 16,
                    center: defaultLocation,
                    disableDefaultUI: true, // this disables street view option, full screen option, and switch between normal and satellite view 
                    styles: [
                        {
                            featureType: 'poi',
                            elementType: 'labels',
                            stylers: [{ visibility: 'off' }] //no point of interests shown due to clash with parking symbol/markers
                        }
                    ]
                });

                createOrUpdateDestinationMarker(defaultLocation);
                addParkingMarkers(defaultLocation);
                Searchbox();
            } else {
                alert('Default location cannot be found: ' + defaultLocationString);
               
            }
        });
    }

    // Creates the search box
    function Searchbox(){
    var input = document.getElementById('searchinput');
    searchBox = new google.maps.places.SearchBox(input);
    map.controls[google.maps.ControlPosition.TOP_CENTER].push(input);

    // the bounds change, with viewport 
    map.addListener('bounds_changed', function() {
        searchBox.setBounds(map.getBounds());
    });

    // detects when users has entered search
    searchBox.addListener('places_changed', function() {
        var places = searchBox.getPlaces();

        if (places.length == 0) {
            return;
        }

        // Clear out the old markers.
        markers.forEach(function(marker) {
            marker.setMap(null);
        });
        markers = [];

        // receives information regarding the new places such as size, origin, URL
        var bounds = new google.maps.LatLngBounds();
        places.forEach(function(place) {
            if (!place.geometry) {
                console.log("Returned place contains no geometry");
                return;
            }
            var icon = {
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
                map: map,
                icon: icon,
                title: place.name,
                position: place.geometry.location
            }));

            if (place.geometry.viewport) {
                bounds.union(place.geometry.viewport);
            } else {
                bounds.extend(place.geometry.location);
            }
        });
        map.fitBounds(bounds);
        
        if (places.length > 0) {
            map.setCenter(places[0].geometry.location);
        }

        // Shows parking markers for the new destination
        addParkingMarkers(places[0].geometry.location);

        // Updates red destination marker
        createOrUpdateDestinationMarker(places[0].geometry.location);
    });
    }

    if(destination==="Default Location") {
        DefaultLocationMap();
        Searchbox();
    } else {
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 16,
            disableDefaultUI: true,
            styles: [
                {
                    featureType: 'poi',
                    elementType: 'labels',
                    stylers: [{ visibility: 'off' }] 
                }
            ]
        });
        geocoder.geocode({ 'address': destination }, function(results, status) {
            if (status === 'OK') {
                var destinationLocation = results[0].geometry.location;
                createOrUpdateDestinationMarker(destinationLocation);
                map.setCenter(destinationLocation);
                addParkingMarkers(destinationLocation);
            } else {
                alert('Your destination cannot be found: ' + destination);
                DefaultLocationMap();
            }
            Searchbox();
        });
    }

    // Function to show infowindow for each parking marker that is displayed on the map when clicked. 
    var openInfoWindow = null;
    function createMarker(place) {
        var marker = new google.maps.Marker({
            map: map,
            position: place.geometry.location,
            title: place.name,
            icon: 'img/ParkingMarker.png'
        });
        var infopopup = new google.maps.InfoWindow({
            content: '<div style="font-size:24px;"><strong>' + place.name + '</strong><br>' + ' Price:<strong> £3 per hour </strong><br><a href="CarParkInfo.php">Click for more Information</a></div>' 
        });
        marker.addListener('click', function() {
            if (openInfoWindow) {
                openInfoWindow.close();
            }
            infopopup.open(map, marker);
            openInfoWindow = infopopup;
        });
    }
}
</script>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBxRlDK1gWVEU90vi6q4hkwg1jS7d7zFSQ&libraries=places&callback=initMap" async defer></script>
</body>
</html>
