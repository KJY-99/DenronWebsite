

var charges = 0;
var location;
var checkin = new Date();
//var map, infoWindow;

//function initMap() {
 

//    map = new google.maps.Map(document.getElementById('map'), {
//        center: { lat: -34.397, lng: 150.644 },
//        zoom: 15
//    });
//    infoWindow = new google.maps.InfoWindow;

//    // Try HTML5 geolocation.
//    if (navigator.geolocation) {
//        navigator.geolocation.getCurrentPosition(function (position) {
//            var pos = {
//                lat: position.coords.latitude,
//                lng: position.coords.longitude
//            };

//            map.setCenter(pos);
//            infoWindow.setPosition(pos);
//            infoWindow.setContent('Location found.');
//            infoWindow.open(map);

//            const Http = new XMLHttpRequest();
//            const url = "https://developers.onemap.sg/privateapi/commonsvc/revgeocodexy?location=" + pos[0] + "," + pos[1] + "&token=0v9hsciobp1ifa5bgpkin21cs3";
//            Http.open("GET", url);
//            Http.send();

//            Http.onreadystatechange = (e) => {
//                console.log(Http.responseText)
//            }            
        
//        }, function () {
//            handleLocationError(true, infoWindow, map.getCenter());
//        });
//    }
//    else {
//        // Browser doesn't support Geolocation
//        handleLocationError(false, infoWindow, map.getCenter());
//    }
//}

//function handleLocationError(browserHasGeolocation, infoWindow, pos) {
//    infoWindow.setPosition(pos);
//    infoWindow.setContent(browserHasGeolocation ?
//        'Error: The Geolocation service failed.' :
//        'Error: Your browser doesn\'t support geolocation.');
//    infoWindow.open(map);
//}

var center = L.bounds([1.56073, 104.11475], [1.16, 103.502]).getCenter();
var map = L.map('mapdiv').setView([center.x, center.y], 12);

var basemap = L.tileLayer('https://maps-{s}.onemap.sg/v3/Default/{z}/{x}/{y}.png', {
    detectRetina: true,
    maxZoom: 18,
    minZoom: 11,
});


map.setMaxBounds([[1.56073, 104.1147], [1.16, 103.502]]);

basemap.addTo(map);

if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(success,error,options);
} 

//SUCCESS , ERROR FUNCTION + OPTIONS VARIABLE == GEOLOCATION.GETCURRENTPOSITION PARAMETERS.


function success(pos) {
    lat = pos.coords.latitude;
    long = pos.coords.longitude;

    L.Icon.Default.imagePath = './images';
    marker = new L.Marker([lat, long], { bounceOnAdd: false }).addTo(map);
    console.log(lat);
    console.log(long);

    marker.on('click', function (e) {
        map.setView([lat, long], 18)
    });

    $.ajax({
        url: 'https://developers.onemap.sg/privateapi/commonsvc/revgeocode?location=' + lat + ',' + long + '&token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjQ5NDgsInVzZXJfaWQiOjQ5NDgsImVtYWlsIjoia2p5MjI4MTdAZ21haWwuY29tIiwiZm9yZXZlciI6ZmFsc2UsImlzcyI6Imh0dHA6XC9cL29tMi5kZmUub25lbWFwLnNnXC9hcGlcL3YyXC91c2VyXC9zZXNzaW9uIiwiaWF0IjoxNTk1OTEyOTEwLCJleHAiOjE1OTYzNDQ5MTAsIm5iZiI6MTU5NTkxMjkxMCwianRpIjoiOGMxM2YwYWFlMWI3NmJlYmUzNDcxNDMwYTc2MWJmNzQifQ.BJwry-BR29uNmWvnwHSHA9Yw3gJJh0PGvHwU6Qw4mI8&buffer=100&addressType=all&otherFeatures=Y',
        success: function (result) {
            //Set result to a variable for writing
            var pinpointlocation = result.GeocodeInfo[3];
            locationarray = Object.values(pinpointlocation);
            var buildingname = locationarray[0];
            var block = locationarray[1];
            var road = locationarray[2];
            var postalcode = locationarray[3];

            if (buildingname == "null") {
                document.getElementById("locationdiv").innerHTML = block + " " + road + "<br />" + postalcode;
            }
            else {
                document.getElementById("locationdiv").innerHTML = block + " " + road + "<br />" + buildingname + "<br />" + postalcode;
            }

            sessionStorage.setItem("buildingname", buildingname);
            sessionStorage.setItem("block", block);
            sessionStorage.setItem("road", road);
            sessionStorage.setItem("postalcode", postalcode);

        }
    });
 
}

function error() {
    console.warn("error in geolocation API.")
}

var options = {
    enableHighAccuracy: true,
    timeout: 5000,
    maximumAge: 0
};


function TimeCalculator() {
    var checkout = new Date();
    differencehours = (checkout.getHours() - checkin.getHours());
    checkminutes = (checkout.getMinutes() - checkin.getMinutes());

    if (differencehours < 1) {
        differencehours = 1;
    }

    if (checkminutes >= 30) {
        differencehours += 1;
    }

    if (differencehours < 1 && checkminutes >= 30) {
        differencehours = 1;
    }

    charges = differencehours;
    sessionStorage.setItem("Checkin", checkin);
    sessionStorage.setItem("Checkout", checkout);
    sessionStorage.setItem("Charges", charges);
}

