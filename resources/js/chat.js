import './bootstrap';

console.log("loaded")
var last_state;
window.channel = window.Echo.join('user' + user1+".chat.user"+user2)
.listen('.message-sent', (data) => {
    // if the sent mesesage event not from me 
    if(data.sender_id!=auth_id){
        KTBootstrapNotifyDemo.init(data.sender_name+" has sent you a new message.");
        $('#messages-body').append(data.message_body);
        // this method in form.js file
       
        _markMessageAsRead(data.message_id)
    
        
    }
    
}).here((users) => {

    if(users.length==2){
        last_state="Online"
        $("#active_text").html("Online")
        $("#active_label").removeClass('label-danger')
        $("#active_label").addClass('label-success')
        
    }
})
.joining((user) => {
    last_state="Online"
    $("#active_text").html("Online")
    $("#active_label").removeClass('label-danger')
    $("#active_label").addClass('label-success')

    _ChangeSeenIconWhenRead()
})
.leaving((user) => {
    last_state="Offline"
    $("#active_text").html("Offline")
    $("#active_label").removeClass('label-success')
    $("#active_label").addClass('label-danger')
}).listenForWhisper('typing', (data) => {
    // Handle the whisper event

    if (data.typing) {
        
        if($("#typing_dots").hasClass("d-none")){

            $("#typing_dots").removeClass("d-none")
        }
        $("#active_text").html("Typing...")

    } else {
      
        if(!$("#typing_dots").hasClass("d-none")){

            $("#typing_dots").addClass("d-none")
        }
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

