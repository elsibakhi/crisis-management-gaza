import './bootstrap';



    $.ajax({
        url: "/api/get-dummy-user-id",
        type: "GET",
      
        success: function(response) {
            if (response) {
                window.Echo.channel(`public-dummy-user.${response.user_id}`)
                .listen('.contribution-acceptance', (data) => {
              
                   
                    $('#pane_notifications_contributionAcceptance').load('/notification/load/contributionAcceptance');
                    commanBetweenNotifications()

                    if ($("#contribution_status_span").length > 0) {
                                  // Get the span element by ID
                                  var statusSpan = $('#contribution_status_span');

                                  // Change the content and class of the span based on the response status
                                  statusSpan.text(data.status); // Set the status text
          
                                  // Remove any existing label classes
                                  statusSpan.removeClass('label-light-success label-light-danger label-light-warning');
          
                                  // Add the appropriate class based on the response status
                                  switch (data.status) {
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
                
                });
            
            }  
        }
    });

    function commanBetweenNotifications(){
        let last_unread_number = parseInt($('#notification_badge').html()); // Convert to integer
        $('#notification_badge').html(++last_unread_number); // Pre-increment to update immediately
        $('#notification_pulse').html(last_unread_number); // Pre-increment to update immediately
    
    }