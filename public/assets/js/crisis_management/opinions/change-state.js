function changeState(route, token) {
    $.ajax({
        url: route,
        type: 'POST',
        data: {
            "_token": token,


        },
        success: function(response) {
            if (response) {


           
                KTBootstrapNotifyDemo.init(response.message);

                          //reload datatable
                        $('#kt_datatable').DataTable().draw();  


            }
        },
        error: function(error) {
            // Handle AJAX request error
            Swal.fire({
                text: error.responseJSON.message,
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: system_translation['Ok, got it!'],
                customClass: {
                    confirmButton: "btn font-weight-bold btn-primary",
                }
            });
        }
    });
}