import './bootstrap';


window.Echo.private('App.Models.User.' + userID)
    .listen('.service-added', (data) => {
     
     
        commanBetweenNotifications()
        
    })
    .listen('.link-added', (data) => {
      
        commanBetweenNotifications()
    })
    .listen('.contribution-added', (data) => {
      
        commanBetweenNotifications()
    })
    .listen('.note-added', (data) => {
      
        commanBetweenNotifications()
    })
    .listen('.complaint-added', (data) => {
       
        commanBetweenNotifications()
    })
    .listen('.message-sent', (data) => {
        $('#user_chats').load('/chat/message/chats/load');
    })
    ;



    function commanBetweenNotifications(){
        $('#user_notifications').load('/notification/load/user/notifications');

        if ($("#kt_datatable").length > 0) {
            $("#kt_datatable").DataTable().draw();
        } 
    }









