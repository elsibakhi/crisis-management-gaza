// let deleteable=false;

    function _delete(route,token,deleteable="") {
            
       

                Swal.fire({
                    text: system_translation["Are you sure you want to delete this item?"],
                    icon: "question",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: system_translation["Yes, delete!"],
                    cancelButtonText: system_translation["No, cancel"],
                    customClass: {
                        confirmButton: "btn font-weight-bold btn-primary",
                        cancelButton: "btn font-weight-bold btn-default"
                    }
                }).then(function (result) {
                    if (result.value) {
                        $.ajax({
                            url: route,
                            type: 'POST',
                            data: {
                                "_token":token,
                                "_method":"DELETE",
                
                            },
                            success: function (response) {
                                if (response) {
                        
                                          
                                   
                                       
                                        KTBootstrapNotifyDemo.init(response.message);
                                            if(deleteable=="note"){
                                                let last_number = parseInt($('#note_span').html()); // Convert to integer
                                    
                                                $('#note_span').html(--last_number); // Pre-increment to update immediately
                                                refreshNotes();
                                            }else{
                                                //reload datatable
                                            $('#kt_datatable').DataTable().draw();
                                            }
                                } else {
                                    // Handle server-side validation errors or other errors
                                    Swal.fire({
                                        text: system_translation["An error occurred while deleting the record"],
                                        icon: "error",
                                        buttonsStyling: false,
                                        confirmButtonText: system_translation["Ok, got it!"],
                                        customClass: {
                                            confirmButton: "btn font-weight-bold btn-primary",
                                        }
                                    });
                                }
                            },
                            error: function (error) {
                                // Handle AJAX request error
                                Swal.fire({
                                    text: error.responseJSON.message,
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: system_translation["Ok, got it!"],
                                    customClass: {
                                        confirmButton: "btn font-weight-bold btn-primary",
                                    }
                                });
                            }
                        });
                    } else if (result.dismiss === 'cancel') {
                        Swal.fire({
                            text: system_translation["The delete opreation canceled!"],
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: system_translation["Ok, got it!"],
                            customClass: {
                                confirmButton: "btn font-weight-bold btn-primary",
                            }
                        });
                    }
                });





            

    }       
    function _post(route,token,opreation=false) {
            
       

                Swal.fire({
                    text: system_translation["Are you sure you want to "+opreation+" this item?"],
                    icon: "question",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: system_translation["Yes, "+opreation+"!"],
                    cancelButtonText: system_translation["No, cancel"],
                    customClass: {
                        confirmButton: "btn font-weight-bold btn-primary",
                        cancelButton: "btn font-weight-bold btn-default"
                    }
                }).then(function (result) {
                    if (result.value) {
                        $.ajax({
                            url: route,
                            type: 'POST',
                            data: {
                                "_token":token,
                              
                
                            },
                            success: function (response) {
                                if (response) {
                        
                                          
                                    KTBootstrapNotifyDemo.init(response.message);
                                        
                                        if(response.working_days_change){
                                          
                                            KTBootstrapNotifyDemo.init(system_translation["We changed the service working days"]);
                                        }
                                                //reload datatable
                                            $('#kt_datatable').DataTable().draw();
                                            
                                } else {
                                    // Handle server-side validation errors or other errors
                                    Swal.fire({
                                        text: system_translation["An error occurred while deleting the record"],
                                        icon: "error",
                                        buttonsStyling: false,
                                        confirmButtonText: system_translation["Ok, got it!"],
                                        customClass: {
                                            confirmButton: "btn font-weight-bold btn-primary",
                                        }
                                    });
                                }
                            },
                            error: function (error) {
                                // Handle AJAX request error
                                Swal.fire({
                                    text: error.responseJSON.message,
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: system_translation["Ok, got it!"],
                                    customClass: {
                                        confirmButton: "btn font-weight-bold btn-primary",
                                    }
                                });
                            }
                        });
                    } else if (result.dismiss === 'cancel') {
                        Swal.fire({
                            text: system_translation["the "+opreation+" opreation canceled!"],
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: system_translation["Ok, got it!"],
                            customClass: {
                                confirmButton: "btn font-weight-bold btn-primary",
                            }
                        });
                    }
                });





            

    }       



    

    function _edit(route) {





              $('#institutionsModal').load(route);
                      
                   
                      
}       
    function _load(div,route,modal=false) {


            $("#"+modal).remove();
       
            $('#' + div).load(route, function () {
                if (modal) {
                    $('#' + modal).modal("show");
                }
                if (modal=="kt_chat_modal") {
                  
                    $('#user_chats').load('/chat/message/chats/load');
                }


            });
       
        
             
            }       






   