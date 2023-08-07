function initialize(){var scripts=document.getElementsByTagName("script");for(var i=0,len=scripts.length;i<len;i++){var src=scripts[i].getAttribute("src");if(src!=null){if(src.indexOf('map.js')>=0){script=scripts[i];}}}var src=script.getAttribute("src").split("?"),args=src[1].split("&");for(var j=0,len=args.length;j<len;j++){var splitArray=args[j].split("=");if(splitArray[0]=='lat'){var lat=splitArray[1];}else{var lng=splitArray[1];}}var styles=[

    {

        "featureType": "all",

        "elementType": "labels.text.fill",

        "stylers": [

            {

                "saturation": 36

            },

            {

                "color": "#000000"

            },

            {

                "lightness": 40

            }

        ]

    },

    {

        "featureType": "all",

        "elementType": "labels.text.stroke",

        "stylers": [

            {

                "visibility": "on"

            },

            {

                "color": "#000000"

            },

            {

                "lightness": 16

            }

        ]

    },

    {

        "featureType": "all",

        "elementType": "labels.icon",

        "stylers": [

            {

                "visibility": "off"

            }

        ]

    },

    {

        "featureType": "administrative",

        "elementType": "geometry.fill",

        "stylers": [

            {

                "color": "#000000"

            },

            {

                "lightness": 20

            }

        ]

    },

    {

        "featureType": "administrative",

        "elementType": "geometry.stroke",

        "stylers": [

            {

                "color": "#000000"

            },

            {

                "lightness": 17

            },

            {

                "weight": 1.2

            }

        ]

    },

    {

        "featureType": "landscape",

        "elementType": "geometry",

        "stylers": [

            {

                "color": "#000000"

            },

            {

                "lightness": 20

            }

        ]

    },

    {

        "featureType": "poi",

        "elementType": "geometry",

        "stylers": [

            {

                "color": "#000000"

            },

            {

                "lightness": 21

            }

        ]

    },

    {

        "featureType": "road.highway",

        "elementType": "geometry.fill",

        "stylers": [

            {

                "lightness": 17

            },

            {

                "color": "#3a3a3a"

            }

        ]

    },

    {

        "featureType": "road.highway",

        "elementType": "geometry.stroke",

        "stylers": [

            {

                "color": "#000000"

            },

            {

                "lightness": 29

            },

            {

                "weight": 0.2

            }

        ]

    },

    {

        "featureType": "road.highway",

        "elementType": "labels.text",

        "stylers": [

            {

                "lightness": "0"

            },

            {

                "color": "#0f182e"

            },

            {

                "weight": "0.5"

            },

            {

                "gamma": "1"

            }

        ]

    },

    {

        "featureType": "road.arterial",

        "elementType": "geometry",

        "stylers": [

            {

                "color": "#3a3a3a"

            },

            {

                "lightness": 18

            }

        ]

    },

    {

        "featureType": "road.arterial",

        "elementType": "labels.text",

        "stylers": [

            {

                "weight": "0.5"

            },

            {

                "color": "#262626"

            }

        ]

    },

    {

        "featureType": "road.local",

        "elementType": "geometry",

        "stylers": [

            {

                "color": "#000000"

            },

            {

                "lightness": 16

            }

        ]

    },

    {

        "featureType": "transit",

        "elementType": "geometry",

        "stylers": [

            {

                "color": "#000000"

            },

            {

                "lightness": 19

            }

        ]

    },

    {

        "featureType": "water",

        "elementType": "geometry",

        "stylers": [

            {

                "color": "#286c77"

            },

            {

                "lightness": 17

            }

        ]

    },

    {

        "featureType": "water",

        "elementType": "labels.text",

        "stylers": [

            {

                "weight": "1"

            },

            {

                "lightness": "70"

            }

        ]

    }

]

var mapOptions={center:new google.maps.LatLng(lat,lng),zoom:16,scrollwheel:false,disableDefaultUI:true,draggable:true,zoomControl:true,zoomControlOptions:{style:google.maps.ZoomControlStyle.DEFAULT,position:google.maps.ControlPosition.RIGHT_CENTER},styles:styles};var map=new google.maps.Map(document.getElementById('map'),mapOptions);var marker;var imageIcon={path:"M50,2.5c-19.2,0-34.8,15-34.8,33.4C15.2,61.3,50,97.5,50,97.5s34.8-36.2,34.8-61.6 C84.8,17.5,69.2,2.5,50,2.5z M50,48.2c-7.1,0-12.9-5.8-12.9-12.9c0-7.1,5.8-12.9,12.9-12.9c7.1,0,12.9,5.8,12.9,12.9 C62.9,42.4,57.1,48.2,50,48.2z",fillColor:'#ffffff',fillOpacity:1,anchor:new google.maps.Point(49,100),strokeWeight:0,scale:0.4}

var myLatLng=new google.maps.LatLng(lat,lng);marker=new google.maps.Marker({map:map,icon:imageIcon,draggable:false,optimized:false,zIndex:300,animation:google.maps.Animation.DROP,position:myLatLng});function toggleBounce(){if(marker.getAnimation()!=null){marker.setAnimation(null);}else{marker.setAnimation(google.maps.Animation.BOUNCE);}}}google.maps.event.addDomListener(window,'load',initialize);