"use strict";

// Class definition
var KTLeaflet = function () {

	// Private functions
    // Private variables
    var leaflet;
    var markerLayer;
    var geocodeService;
    var leafletIcon;

    var demo5 = function () {
		// Define Map Location
		 leaflet = L.map('kt_leaflet_5', {
			center: [40.725, -73.985],
			zoom: 13
		});

		// Init Leaflet Map
		L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		
		}).addTo(leaflet);

		// Set Geocoding
		 geocodeService;
		if (typeof L.esri.Geocoding === 'undefined') {
			geocodeService = L.esri.geocodeService();
		} else {
			geocodeService = L.esri.Geocoding.geocodeService();
		}

		// Define Marker Layer
		 markerLayer = L.layerGroup().addTo(leaflet);

         var pupup_x =0;
         var pupup_y =-37;

       
         if(language=="ar"){
            pupup_x=-73;
            pupup_y=-30;
         }

        		// Set Custom SVG icon marker
		 leafletIcon = L.divIcon({
			html: `<span class="svg-icon svg-icon-danger svg-icon-3x"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="24" width="24" height="0"/><path d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z" fill="#000000" fill-rule="nonzero"/></g></svg></span>`,
			bgPos: [10, 10],
			iconAnchor: [20, 37],
			popupAnchor: [pupup_x, pupup_y],
			className: 'leaflet-marker'
		});

        if(window.page=="Edit"){
            const userLat = window.lastLat;
            const userLng =  window.lastLng;
            const address =  window.address;
    
            // Update map center to user's location
            leaflet.setView([userLat, userLng], 13);
    
            // Add a marker for user's location
            var marker = L.marker([userLat, userLng], { icon: leafletIcon }).addTo(leaflet);
            marker.bindPopup("<b>"+system_translation["Your Location"]+"</b>").openPopup();
    

                // Update the form inputs with location details
                $('input[name="address"]').val(address); // Address input
                $('input[name="lat"]').val(userLat);                      // Latitude hidden input
                $('input[name="lng"]').val(userLng);                      // Longitude hidden input
        
        
        
     }
     else{

// Geolocation: Get current location
if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function (position) {
        const userLat = position.coords.latitude;
        const userLng = position.coords.longitude;

        // Update map center to user's location
        leaflet.setView([userLat, userLng], 13);

        // Add a marker for user's location
        var marker = L.marker([userLat, userLng], { icon: leafletIcon }).addTo(leaflet);
        marker.bindPopup("<b>"+system_translation["Your Location"]+"</b>").openPopup();

        // Reverse geocoding to fetch the address
        geocodeService.reverse().latlng({ lat: userLat, lng: userLng }).run(function (error, result) {
            if (error) {
                console.error(system_translation["Reverse geocoding failed:"]+" ", error);
                return;
            }

                   // Longitude hidden input

            $('input[name="address"]').val(result.address.Match_addr); // Address input
            $('input[name="lat"]').val(userLat);                      // Latitude hidden input
            $('input[name="lng"]').val(userLng);                      // Longitude hidden input
        });
    }, function (error) {
        console.error(system_translation["Geolocation failed:"]+" ", error.message);
    });
} else {
    console.error(system_translation["Geolocation is not supported by this browser"]);
}
        }




		// Map onClick Action
		leaflet.on('click', function (e) {
			geocodeService.reverse().latlng(e.latlng).run(function (error, result) {
				if (error) {
					return;
				}
				markerLayer.clearLayers(); // remove this line to allow multi-markers on click
				L.marker(result.latlng, { icon: leafletIcon }).addTo(markerLayer).bindPopup(result.address.Match_addr, { closeButton: false }).openPopup();
                // Update the form inputs with the clicked location's details
            
                            
            $('input[name="address"]').val(result.address.Match_addr); // Address input
            $('input[name="lat"]').val(result.latlng.lat);                      // Latitude hidden input
            $('input[name="lng"]').val(result.latlng.lng);   
			});
		});
	}

   // Public method to reset the map
   var resetMap = function () {
    // Reset map to default state
    leaflet.setView([40.725, -73.985], 13); // Reset to initial position
    markerLayer.clearLayers(); // Clear all markers

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            const userLat = position.coords.latitude;
            const userLng = position.coords.longitude;
    
            // Update map center to user's location
            leaflet.setView([userLat, userLng], 13);
    
            // Add a marker for user's location
            var marker = L.marker([userLat, userLng], { icon: leafletIcon }).addTo(leaflet);
            marker.bindPopup("<b>"+system_translation["Your Location"]+"</b>").openPopup();
    
            // Reverse geocoding to fetch the address
            geocodeService.reverse().latlng({ lat: userLat, lng: userLng }).run(function (error, result) {
                if (error) {
                    console.error(system_translation["Reverse geocoding failed:"]+" ", error);
                    return;
                }
    
                // Update the form inputs with location details
                $('input[name="address"]').val(result.address.Match_addr); // Address input
                $('input[name="lat"]').val(userLat);                      // Latitude hidden input
                $('input[name="lng"]').val(userLng);                     // Longitude hidden input
    
            
            });
        }, function (error) {
            console.error(system_translation["Geolocation failed:"]+" ", error.message);
        });
    }
};

	return {
		// public functions
		init: function () {
			// default charts
			demo5();
	
		},

        reset: function () {
            resetMap();
        }
	};
}();

jQuery(document).ready(function () {
	KTLeaflet.init();
});




function locationIcon(){
    if (navigator.permissions) {
        navigator.permissions.query({ name: 'geolocation' }).then(function(result) {
          if (result.state === 'granted') {
            KTLeaflet.reset();


          } else if (result.state === 'denied') {
            Swal.fire(system_translation["Location error!"], system_translation["Please enable location services in your browser settings!"], "error");
   
            // يمكنك هنا إظهار رسالة تطلب من المستخدم تمكين الإذن
          } else {
            Swal.fire(system_translation["Location error!"], system_translation["Please enable location services in your browser settings!"], "error");
            // هنا يمكنك طلب الإذن
          }
        });
      } else {
        console.log(system_translation["The browser not support this feature"]);
      }
      
}

