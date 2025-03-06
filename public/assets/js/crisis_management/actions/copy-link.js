function copyLink(text,link_id,token) {
    console.log(link_id)
    navigator.clipboard.writeText(text);


    KTBootstrapNotifyDemo.init(system_translation["The link has been copied"]);
	$.ajax({
        url: "/link/copied/"+link_id,
        type: "POST",
        data: {
            "_token":token
        },
        success: function (response) {
            if (response) {

             
            } 
        },
    
    });



}