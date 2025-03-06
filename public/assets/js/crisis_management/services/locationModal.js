// Class definition
var KTLeaflet2 = function () {

	// Private functions
	var locationModal = function () {
		// define leaflet


		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(function (position) {
				const userLat = position.coords.latitude;
				const userLng = position.coords.longitude;
		
				var leaflet = L.map('kt_leaflet_2', {
					center: [window.service.lat, window.service.lng],
					zoom: 10
				})
		
				// set leaflet tile layer
				L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
					// attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
				}).addTo(leaflet);
				var pupup_x =0;
				var pupup_y =-37;
	   
			  
				if(language=="ar"){
				   pupup_x=-73;
				   pupup_y=-30;
				}
		
				// set custom SVG icon marker
				var leafletIcon1 = L.divIcon({
					html: `<span class="svg-icon svg-icon-danger svg-icon-3x"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="24" width="24" height="0"/><path d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z" fill="#000000" fill-rule="nonzero"/></g></svg></span>`,
					bgPos: [10, 10],
					iconAnchor: [20, 37],
					popupAnchor: [pupup_x, pupup_y],
					className: 'leaflet-marker'
				});
		
				var leafletIcon2 = L.divIcon({
					html: `<span class="svg-icon svg-icon-primary svg-icon-3x"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="24" width="24" height="0"/><path d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z" fill="#000000" fill-rule="nonzero"/></g></svg></span>`,
					bgPos: [10, 10],
					iconAnchor: [20, 37],
					popupAnchor: [pupup_x, pupup_y],
					className: 'leaflet-marker'
				});
				// bind markers with popup
				var marker1 = L.marker( [service.lat, service.lng], { icon: leafletIcon1 }).addTo(leaflet);

		
				// Add a marker for user's location
				var marker2 = L.marker([userLat, userLng], { icon: leafletIcon2 }).addTo(leaflet);

				// حساب المسافة بين الـ markers
// حساب المسافة بين الـ markers
var latLng1 = L.latLng(window.service.lat, window.service.lng);
var latLng2 = L.latLng(userLat, userLng);
var distance = latLng1.distanceTo(latLng2); // المسافة بالمتر

// رسم الخط بين الـ markers
var line = L.polyline([latLng1, latLng2], { color: 'gray' }).addTo(leaflet);
				// Manually add popups to the map
				L.popup({ closeButton: false ,offset: [0, -37] })
				.setLatLng(marker1.getLatLng())
				.setContent(window.service.title)
				.openOn(leaflet);
			L.popup({ closeButton: false ,offset: [0, -37] })
			.setLatLng(marker2.getLatLng())
			.setContent(system_translation["Your Location"])
			.addTo(leaflet);

				marker1.bindPopup(window.service.title, { closeButton: false });
				
				
				marker2.bindPopup(system_translation["Your Location"], { closeButton: false });
// حساب المنتصف باستخدام L.latLngBounds
var bounds = L.latLngBounds(latLng1, latLng2);
var midpoint = bounds.getCenter();  // الحصول على المنتصف

// تحويل المسافة إلى كيلومترات
var distanceInKm = (distance / 1000).toFixed(2);  

// إضافة النص إلى المنتصف
L.marker(midpoint, {
    icon: L.divIcon({
        className: 'leaflet-label',
        html: `<div style="background-color: white; padding: 5px; border-radius: 5px; font-size: 14px; width:fit-content">${distanceInKm} km</div>`
    })
}).addTo(leaflet);


	
			
					L.control.scale().addTo(leaflet);

			}, function (error) {
				console.error(system_translation["Geolocation failed:"]+" ", error.message);
			});
		} else {
			console.error(system_translation["Geolocation is not supported by this browser"]);
		}



	



	}

	return {
		// public functions
		init: function () {
			// default charts
			locationModal();
		}
	};
}();









  
function serviceLocationIcon(){
    if (navigator.permissions) {
        navigator.permissions.query({ name: 'geolocation' }).then(function(result) {
          if (result.state === 'granted') {
		
				KTLeaflet2.init(); // إذا لم تكن الخريطة موجودة، قم بإنشائها
		
			$("#locationServiceModal").modal("show"); // إظهار المودال

          } else if (result.state === 'denied') {
            Swal.fire(system_translation["Location Error"], system_translation["Please enable location services in your browser settings!"], "error");
   
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
