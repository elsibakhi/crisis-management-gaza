"use strict";

// Class definition


var KTBootstrapNotifyDemo = function () {

    var align;
    
    // Private functions
    if(language=="ar"){
align="left";
    }else{
        align="right";
    }
    // basic demo
    var demo = function (message) {

        // init bootstrap switch
        $('[data-switch=true]').bootstrapSwitch();

        // handle the demo
     



            var content = {};

            content.message = message;
            if (false) {
                content.title = 'Notification Title';
            }
            if (false) {
                content.icon = 'icon flaticon-signs' 
            }
            if (false) {
                content.url = 'www.keenthemes.com';
                content.target = '_blank';
            }

            var notify = $.notify(content, {
                type: theme,
                allow_dismiss:false,
                newest_on_top: false,
                mouse_over:  false,
                showProgressbar:  false,
                spacing: 10,
                timer:2000,
                placement: {
                    from:"top",
                    align: align
                },
                // offset: {
                //     x: modal_x,
                //     y: modal_y
                // },
                delay:1000,
                z_index: 10000,
                animate: {
                    enter: 'animate__animated animate__rubberBand',
                    exit: 'animate__animated animate__slideOutUp'
                }
            });

            if (false) {
                setTimeout(function() {
                    notify.update('message', '<strong>Saving</strong> Page Data.');
                    notify.update('type', 'primary');
                    notify.update('progress', 20);
                }, 1000);

                setTimeout(function() {
                    notify.update('message', '<strong>Saving</strong> User Data.');
                    notify.update('type', 'warning');
                    notify.update('progress', 40);
                }, 2000);

                setTimeout(function() {
                    notify.update('message', '<strong>Saving</strong> Profile Data.');
                    notify.update('type', 'danger');
                    notify.update('progress', 65);
                }, 3000);

                setTimeout(function() {
                    notify.update('message', '<strong>Checking</strong> for errors.');
                    notify.update('type', 'success');
                    notify.update('progress', 100);
                }, 4000);
            }
     
    }

    return {
        // public functions
        init: function(message) {
            demo(message);
        }
    };
}();

// jQuery(document).ready(function() {
//     KTBootstrapNotifyDemo.init("hiiiiiiiiii");
// });
