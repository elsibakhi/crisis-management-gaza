
var last_state;
window.channel = window.Echo.join('user' + user1+".chat.user"+user2)
.listen('.message-sent', (data) => {
    // if the sent mesesage event not from me 
    if(data.sender_id!=auth_id){
        KTBootstrapNotifyDemo.init(data.sender_name+" "+system_translation["has sent you a new message"]);
        $('#messages-body').append(data.message_body);
        // this method in form.js file
       
        _markMessageAsRead(data.message_id)
    
        
    }
    
}).here((users) => {

    if(users.length==2){
        last_state=system_translation["Online"]
        $("#active_text").html(system_translation["Online"])
        $("#active_label").removeClass('label-danger')
        $("#active_label").addClass('label-success')
        
    }
})
.joining((user) => {
    last_state=system_translation["Online"]
    $("#active_text").html(system_translation["Online"])
    $("#active_label").removeClass('label-danger')
    $("#active_label").addClass('label-success')

    _ChangeSeenIconWhenRead()
})
.leaving((user) => {
    last_state=system_translation["Offline"]
    $("#active_text").html(system_translation["Offline"])
    $("#active_label").removeClass('label-success')
    $("#active_label").addClass('label-danger')
    if(!$("#typing_dots").hasClass("d-none")){

        $("#typing_dots").addClass("d-none")
    }

}).listenForWhisper('typing', (data) => {
    // Handle the whisper event

    if (data.typing) {
        
      
        $("#active_text").html(system_translation["Typing..."])

    } else {
      
        
        $("#active_text").html(last_state)
    }
}).listenForWhisper('seen', (data) => {
    // Handle the whisper event
   
    _ChangeSeenIconWhenRead()

});






$('#kt_chat_modal').on('hidden.bs.modal', function () {
    window.Echo.leave('user' + user1+".chat.user"+user2);
});




$('#message-input').on('input', function () {
    // Notify others that the user is typing
    window.channel
        .whisper('typing', {
            name: auth_name, // Your user's name
            typing: true,
        });
});

// Optionally, notify when the user stops typing
$('#message-input').on('blur', function () {
    window.channel
        .whisper('typing', {
            name: auth_name,
            typing: false,
        });
});

