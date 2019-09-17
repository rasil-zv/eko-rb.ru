var map,
    styles = [
        {
            "featureType": "administrative",
            "elementType": "all",
            "stylers": [
                {
                    "saturation": "-100"
                }
            ]
        },
        {
            "featureType": "administrative.province",
            "elementType": "all",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "landscape",
            "elementType": "all",
            "stylers": [
                {
                    "saturation": -100
                },
                {
                    "lightness": 65
                },
                {
                    "visibility": "on"
                }
            ]
        },
        {
            "featureType": "poi",
            "elementType": "all",
            "stylers": [
                {
                    "saturation": -100
                },
                {
                    "lightness": "50"
                },
                {
                    "visibility": "simplified"
                }
            ]
        },
        {
            "featureType": "road",
            "elementType": "all",
            "stylers": [
                {
                    "saturation": "-100"
                }
            ]
        },
        {
            "featureType": "road.highway",
            "elementType": "all",
            "stylers": [
                {
                    "visibility": "simplified"
                }
            ]
        },
        {
            "featureType": "road.arterial",
            "elementType": "all",
            "stylers": [
                {
                    "lightness": "30"
                }
            ]
        },
        {
            "featureType": "road.local",
            "elementType": "all",
            "stylers": [
                {
                    "lightness": "40"
                }
            ]
        },
        {
            "featureType": "transit",
            "elementType": "all",
            "stylers": [
                {
                    "saturation": -100
                },
                {
                    "visibility": "simplified"
                }
            ]
        },
        {
            "featureType": "water",
            "elementType": "geometry",
            "stylers": [
                {
                    "hue": "#ffff00"
                },
                {
                    "lightness": -25
                },
                {
                    "saturation": -97
                }
            ]
        },
        {
            "featureType": "water",
            "elementType": "labels",
            "stylers": [
                {
                    "lightness": -25
                },
                {
                    "saturation": -100
                }
            ]
        }
    ];
function initMap(){
    map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 54.756503, lng: 55.936352},
        zoom: 11,
        scrollwheel: true,
        disableDefaultUI:true,
        zoomControl: true
    });
    marker_one = new google.maps.Marker({
        position: {lat: 54.727640, lng: 55.968066},
        map: map,
        title: 'г. Уфа, ул. Кирова, 52',
        icon: {
            url: "/bitrix/templates/clinic/img/map-marker.png",
            scaledSize: new google.maps.Size(30, 45)
        }
    });
    marker_two = new google.maps.Marker({
        position: {lat: 54.713622, lng: 55.842738},
        map: map,
        title: 'г. Уфа, ул. Генерала Кусимова, 15/1',
        icon: {
            url: "/bitrix/templates/clinic/img/map-marker.png",
            scaledSize: new google.maps.Size(30, 45)
        }
    });
    marker_three = new google.maps.Marker({
        position: {lat: 54.773500, lng: 56.016588},
        map: map,
        title: 'г. Уфа, ул. Рихарда Зорге, 75',
        icon: {
            url: "/bitrix/templates/clinic/img/map-marker.png",
            scaledSize: new google.maps.Size(30, 45)
        }
    });
    map.setOptions({styles: styles});
}