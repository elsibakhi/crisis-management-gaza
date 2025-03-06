


////////////////////////////////




if (navigator.permissions) {
    navigator.permissions.query({ name: 'geolocation' }).then(function(result) {
      if (result.state === 'granted') {
       
     
        for (const key in load_routes) {
       
          load_section(key,"auto")
         }
      


      } else if (result.state === 'denied') {
        for (const key in load_routes) {
       
          load_section(key)
         }
      } else {
       

 
      
        
           
// Geolocation: Get current location
if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function (position) {
      
        for (const key in load_routes) {
        
           load_section(key,"auto")
          }
     

    }, function (error) {

        if ( getCookie("address")  == null || getCookie("region")  == null ){
    
                // show the modal	
                $('#locationModal').modal('show');

                }
       
    });
} else {

  
     if ( getCookie("address")  == null || getCookie("region")  == null ){
        // show the modal	
        $('#locationModal').modal('show');
            } 
    


  
}








        // هنا يمكنك طلب الإذن
      }
    });
  }




 function load_section(section,type="public"){
	KTApp.block("#"+section+"-section", {
		overlayColor: '#000000',
		state: 'primary',
		message: system_translation['Loading...']
	});
  if(search){

    $( "#"+section+"-section" ).load( load_routes[section]+"?search="+search);

  }else{
  

    
        if(type=="auto"){
      
          // Geolocation: Get current location

  

  navigator.geolocation.getCurrentPosition(function (position) {
      const userLat = position.coords.latitude;
      const userLng = position.coords.longitude;

      
      $( "#"+section+"-section" ).load(   load_routes[section] + "?lat="+userLat+"&lng="+userLng );
 



  
  }, function (error) {
     
   
  });
 
        
                 
        }else{

          $( "#"+section+"-section" ).load( load_routes[section]);
        }
      }
  }




  function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    let expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }


  function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return null;
  }


  $('#locationModal').on('hidden.bs.modal', function () {
    // Code to execute when the modal is closed
    for (const key in load_routes) {
        
      load_section(key)
     }
    // Add your custom functionality here
  });