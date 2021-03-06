"use strict";

// MAP functions

// Click AROUND ME to get to my location
document.querySelector(".around_me").addEventListener("click", function(){ myLocation();} );

// cities 
let Vilnius = {lat: 54.686925, lng:  25.279392};
let Kaunas = {lat: 54.898132, lng:  23.902677};
let Klaipeda = {lat: 55.703102, lng:  21.141529};

//CALL MAP
function initMap(location, zoomLevel) {
    let options = {
        zoom: zoomLevel,
        center: location,
        styles: greyStyle,  
    }
    let map = new google.maps.Map(document.getElementById('map'), options);
    let lastWindow=null;
    let currentMarker=null;

    //define marker 
    
    function addMarker(markerInfo) {   
        let marker = new google.maps.Marker({
            position: markerInfo.coords,
            map: map,  
            icon: markerInfo.icon,
            // labelContent:markerInfo.labelContent,
        });      
        let infowindow = new google.maps.InfoWindow({
            content: markerInfo.content,       
        });

          marker.addListener('click', function() {         
        if (lastWindow) {
            lastWindow.close();
        }

        // if (currentMarker != null) {
        //     currentMarker.setIcon('https://www.google.com/mapfiles/marker_red.png');
        //     currentMarker = null;
        // };
        // currentMarker = marker;
        // marker.setIcon('https://www.google.com/mapfiles/marker_green.png');



        infowindow.open(map, this);
        lastWindow=infowindow;
        map.setZoom(15);
        map.panTo(marker.getPosition());

    });

    }


  

    // marker.addListener('click', function() {         
    //     if (lastWindow) {
    //         lastWindow.close();
    //     }
    //     marker.icon.scale = 0.5;
    //     infowindow.open(map, this);
    //     lastWindow=infowindow;
    //     map.setZoom(15);
    //     map.panTo(marker.getPosition());

    //     console.log(marker.icon.scale);
    // });



    //loop add markers 
    for( let i=0; i < markers.length; i++) {
        addMarker(markers[i]);
    }

    //open infowindow for selected image 
    for(let i =0; i< markers.length; i++){
        let selectedContent = markers[i]['content'];
        let selectedLat = location.lat;
        
        // console.log(selectedLat);
        if(selectedLat == markers[i]['coords'].lat) {

            let infowindow = new google.maps.InfoWindow({
                content: selectedContent,
                pixelOffset: new google.maps.Size(12,0)
                });  

            infowindow.setPosition(location);
            infowindow.open(map);
            lastWindow=infowindow;       
        }
    }    

    // Go to map marker on Image Click
    let selectImage = document.querySelectorAll(".spots-gallery__image");
    let imageId = 0;
    for( let i = 0; i< selectImage.length; i++){
    
        selectImage[i].addEventListener('click',function() { 
            document.location='#map-anchor';
            let imageId = selectImage[i].dataset.coords;
            let imageIdArray = imageId.split(', ');
            let imageIdLat = imageIdArray[1] * 1;
            let imageIdLng = imageIdArray[2] * 1;
            let imageCoords = {lat: imageIdLat, lng: imageIdLng};
            for(let i =0; i< markers.length; i++){
                if(imageCoords.lat == markers[i]['coords'].lat) {
                    initMap(markers[i]['coords'], 15);                     
                }           
            };   
        });
    };

} // end of initMap();

function hideAllInfoWindows(map) {
    markers.forEach(function(marker) {
      marker.infowindow.close(map, marker);
   }); 
 }

// MY LOCATION
var map, infoWindow;
function myLocation() {
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: -34.397, lng: 150.644},
    zoom: 15,
    styles: greyStyle,
  });
  infoWindow = new google.maps.InfoWindow;

  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      infoWindow.setPosition(pos);
      infoWindow.setContent('Your Location.');
      infoWindow.open(map);
      map.setCenter(pos);
    }, function() {
      handleLocationError(true, infoWindow, map.getCenter());
    });
  } else {
    // Browser doesn't support Geolocation
    handleLocationError(false, infoWindow, map.getCenter());
  }
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(browserHasGeolocation ?
                        'Error: The Geolocation service failed.' :
                        'Error: Your browser doesn\'t support geolocation.');
  infoWindow.open(map);
}

//map style
let greyStyle = [
    {
    "elementType": "geometry",
    "stylers": [
        {
        "color": "#f5f5f5"
        }
    ]
    },
    {
    "elementType": "labels.icon",
    "stylers": [
        {
        "visibility": "off"
        }
    ]
    },
    {
    "elementType": "labels.text.fill",
    "stylers": [
        {
        "color": "#616161"
        }
    ]
    },
    {
    "elementType": "labels.text.stroke",
    "stylers": [
        {
        "color": "#f5f5f5"
        }
    ]
    },
    {
    "featureType": "administrative.land_parcel",
    "elementType": "labels.text.fill",
    "stylers": [
        {
        "color": "#bdbdbd"
        }
    ]
    },
    {
    "featureType": "poi",
    "elementType": "geometry",
    "stylers": [
        {
        "color": "#eeeeee"
        }
    ]
    },
    {
    "featureType": "poi",
    "elementType": "labels.text.fill",
    "stylers": [
        {
        "color": "#757575"
        }
    ]
    },
    {
    "featureType": "poi.park",
    "elementType": "geometry",
    "stylers": [
        {
        "color": "#e5e5e5"
        }
    ]
    },
    {
    "featureType": "poi.park",
    "elementType": "labels.text.fill",
    "stylers": [
        {
        "color": "#9e9e9e"
        }
    ]
    },
    {
    "featureType": "road",
    "elementType": "geometry",
    "stylers": [
        {
        "color": "#ffffff"
        }
    ]
    },
    {
    "featureType": "road.arterial",
    "elementType": "labels.text.fill",
    "stylers": [
        {
        "color": "#757575"
        }
    ]
    },
    {
    "featureType": "road.highway",
    "elementType": "geometry",
    "stylers": [
        {
        "color": "#dadada"
        }
    ]
    }
];


















