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
                // Get the span element by ID
                var statusSpan = $('#status_span');

                // Change the content and class of the span based on the response status
                statusSpan.text(system_translation[response.status]); // Set the status text

                // Remove any existing label classes
                statusSpan.removeClass('label-light-success label-light-danger label-light-warning');

                // Add the appropriate class based on the response status
                switch (response.status) {
                    case "accepted":
                        statusSpan.addClass('label-light-success');
                        break;
                    case "rejected":
                        statusSpan.addClass('label-light-danger');
                        break;
                    case "pending":
                        statusSpan.addClass('label-light-warning');
                        break;

                }


            }
        },
        error: function(error) {
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
}