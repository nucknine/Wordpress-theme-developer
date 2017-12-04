

window.onload = getMyLocation;

function getMyLocation() {
    var myLatlng = new google.maps.LatLng(61.792935, 34.394327); //координаты компании
    var myOptions = {
        scrollwheel: false, //запрет прокрутки колесом
        zoom: 15,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP //тип карты
    }
    var map = new google.maps.Map(document.getElementById("map"), myOptions); //инициализация карты

    addMarker(map, myLatlng); //добавить маркер передаем координаты и карту
}

function addMarker(map, myLatlng) {
    //иконка маркера
    var companyImage = new google.maps.MarkerImage(
        '/wp-content/themes/schoolpresshome/css/img/icons/png/star-full.png',
        new google.maps.Size(32,32),
        new google.maps.Point(0,0),
        new google.maps.Point(16,16)
    );


    //маркер для компании
    var markerOptions = {
        icon: companyImage,
        position: myLatlng,
        map: map,
        clickable: true,
        title:"Создай свой курс!" //при наведении
    };

    var marker = new google.maps.Marker(markerOptions);

    var contentString = '<div id="content">Добро пожаловать!</div>'; //контент при клике

    var infowindow = new google.maps.InfoWindow({
    content: contentString
    });


    google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
    });
}





// //функция округления числа до нужного количества знаков
// function roundPlus(x, n) { //x - число, n - количество знаков
//   if(isNaN(x) || isNaN(n)) return false;
//   var m = Math.pow(10,n);
//   return Math.round(x*m)/m;
// }

// //опции отслеживания проверка положения каждые 100мс без кэширования и высокая точность
// var options = {
//     enableHightAccuracy: true,
//     timeout: 100,
//     maximumAge: 0
// };
// var map = null;

// //координаты компании
// var ourCoords = {
//     lat: 61.792935,
//     lng: 34.394327
// };

// window.onload = getMyLocation;

// function getMyLocation() {
//     if(navigator.geolocation) {
//         navigator.geolocation.getCurrentPosition(displayLocation, displayError, options);

//         var getRoute = document.getElementById("getRoute");
//         getRoute.onclick = route;

//         var myLoc = document.getElementById("myLoc");
//         myLoc.onclick = showMyLoc;

//         var companyLoc = document.getElementById("companyLoc");
//         companyLoc.onclick = showCompanyLoc;

//   } else {
//     alert("no support geolocation");
//   }
// }

// function displayLocation(position) {
//     var latitude = position.coords.latitude;
//     var longitude = position.coords.longitude;

//     var km = computeDistance(position.coords, ourCoords);
//     var distance = document.getElementById("distance");
//     distance.innerHTML = 'Вы в <span class="location__distance_red">' + km + ' км</span> от нашей компании';
//     distance.innerHTML += " (" + position.coords.accuracy + "м погрешность)"
//     if (map == null) showMap(position.coords);
// }

// function displayError(error) {
//     var errorTypes = {
//         0: "Unknown error",
//         1: "Permission denied by user",
//         2: "Position is no available",
//         3: "Request timed out"
//     };
//     var errorMessage = errorTypes[error.code];
//     if (error.code == 0 || error.code == 2) {
//         errorMessage = errorMessage + " " + error.message;
//     }
//     var div = document.getElementById("distance");
//     div.innerHTML = errorMessage;
//     options.timeout +=100;
//     navigator.geolocation.getCurrentPosition(
//         displayLocation,
//         displayError,
//         options);
//     div.innerHTML += "... попытка с timeout = " + options.timeout + " мс";
// }

// //computeDistance////////////////////////////////////////
// function computeDistance (startCoords, destCoords) {
//     var startLatRads = degreesToRadians(startCoords.latitude);
//     var startLongRads = degreesToRadians(startCoords.longitude);
//     var destLatRads = degreesToRadians(destCoords.lat);
//     var destLongRads = degreesToRadians(destCoords.lng);

//     var Radius = 6371;
//     var distance = Math.acos(Math.sin(startLatRads)*Math.sin(destLatRads)+Math.cos(startLatRads)*Math.cos(destLatRads)*Math.cos(startLongRads - destLongRads))*Radius;
//     return roundPlus(distance, 2);
// }

// function degreesToRadians(degrees) {
//     var radians = (degrees * Math.PI) / 180;
//     return radians;
// }
// //////////////////////////////////////////////////////////

// function showMap(coords) {
//     var googleLatAndLong = new google.maps.LatLng(coords.latitude, coords.longitude);

//     var mapOptions = {
//         scrollwheel: false,
//         zoom: 15,
//         center: ourCoords,
//         mapTypeId: google.maps.MapTypeId.ROADMAP
//     };

//     var mapDiv = document.getElementById("map");
//     map = new google.maps.Map(mapDiv, mapOptions);

//     var title = "Ваше местоположение";
//     var content = "Вы находитесь здесь: " + coords.latitude + ", " + coords.longitude;
//     addMarker(map, googleLatAndLong, title, content);
// }

// //showCompanyLoc////////////////////////////////////////////////////////
// function showCompanyLoc() {
//     if(navigator.geolocation) {
//         navigator.geolocation.getCurrentPosition(displayLoc, displayError, options);
//         }

//         function displayLoc(position) {
//         var coords = {
//     lat: position.coords.latitude,
//     lng: position.coords.longitude
//         };

//         var mapOptions = {
//         scrollwheel: false,
//         zoom: 15,
//         center: ourCoords,
//         mapTypeId: google.maps.MapTypeId.ROADMAP
//     };

//     var mapDiv = document.getElementById("map");
//     map = new google.maps.Map(mapDiv, mapOptions);

//         var title = "Ваше местоположение";
//     var content = "Вы находитесь здесь: " + coords.lat + ", " + coords.lng;

//         addMarker(map, coords, title, content);
//     }
// }
// //showMyLoc////////////////////////////////////////////////////////

// function showMyLoc() {
//     if(navigator.geolocation) {
//         navigator.geolocation.getCurrentPosition(displayLoc, displayError, options);
//         }

//         function displayLoc(position) {
//         var coords = {
//     lat: position.coords.latitude,
//     lng: position.coords.longitude
//         };

//         var mapOptions = {
//         scrollwheel: false,
//         zoom: 15,
//         center: coords,
//         mapTypeId: google.maps.MapTypeId.ROADMAP
//     };

//     var mapDiv = document.getElementById("map");
//     map = new google.maps.Map(mapDiv, mapOptions);

//         var title = "Ваше местоположение";
//     var content = "Вы находитесь здесь: " + coords.lat + ", " + coords.lng;

//         addMarker(map, coords, title, content);
//     }
// }
// //////////////////////////////////////////////////////////

// function addMarker(map, latlong, title, content) {
//     //маркер для компании
//     var companyImage = new google.maps.MarkerImage(
//         '../css/img/icons/png/star-full.png',
//         new google.maps.Size(32,32),
//         new google.maps.Point(0,0),
//         new google.maps.Point(16,16)
//     );

//     var markerCompanyOptions = {
//         icon: companyImage,
//         position: ourCoords,
//         map: map,
//         title: "Наша компания",
//         clickable: true
//     };

//     var markerCompany = new google.maps.Marker(markerCompanyOptions);

//     //маркер вашего местоположения
//     var markerOptions = {
//         position: latlong,
//         map: map,
//         title: title,
//         clickable: true
//     };

//     var marker = new google.maps.Marker(markerOptions);

//   var infoWindowOptions = {
//     content: content,
//     position: latlong
//   };

//   var infoWindow = new google.maps.InfoWindow(infoWindowOptions);

//   google.maps.event.addListener(marker, "click", function(){
//     infoWindow.open(map);
//         });
// }

// //////////////////////////////////////////////////////////////////////////////////////
// function route() {
//         if(navigator.geolocation) {
//         navigator.geolocation.getCurrentPosition(displayLoc, displayError, options);
//         }

//         function displayLoc(position) {
//     var latitude = position.coords.latitude;
//     var longitude = position.coords.longitude;

//         var directionsService = new google.maps.DirectionsService;
//     var directionsDisplay = new google.maps.DirectionsRenderer;

//         var mapOptions = {
//         scrollwheel: false,
//         zoom: 15,
//         center: {lat:position.latitude, lng:position.longitude},
//         mapTypeId: google.maps.MapTypeId.ROADMAP
//     };

//     var mapDiv = document.getElementById("map");

//     map = new google.maps.Map(mapDiv, mapOptions);

//         directionsDisplay.setMap(map);

//     directionsService.route({
//           origin: new google.maps.LatLng(latitude, longitude),
//           destination: new google.maps.LatLng(ourCoords),
//           travelMode: 'DRIVING'
//         }, function(response, status) {
//           if (status === 'OK') {
//             directionsDisplay.setDirections(response);
//           } else {
//             window.alert('Directions request failed due to ' + status);
//           }
//         });

//         }
// }