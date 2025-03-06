"use strict";



		// Submit event
		
		$("#chat-form").on('submit', function (event) {
			event.preventDefault();
	
			var validator = FormValidation.formValidation(document.getElementById('chat-form'), {
				fields: {
				
					
					 message: {
						validators: {
							notEmpty: {
								message: system_translation['The message is required'],
							},
							stringLength: {
								min: 1,
								max: 500,
								message: system_translation['The message must be more than 0 and less than 500 characters long'],
							},
							
						},
					},
		
				
	
				},

			});
			

			var form =$("#chat-form");
			var formSubmitButton = KTUtil.getById('submit_btn');
			var _buttonSpinnerClasses = 'spinner spinner-right spinner-white pr-15';
		
			// var form = KTUtil.getById('kt_form');
					// Validate form before change wizard step
			// var validator = _validations[0]; // get validator for currnt step

			if (validator) {
				validator.validate().then(function (status) {
					if (status == 'Valid') {
						KTUtil.btnWait(formSubmitButton, _buttonSpinnerClasses, system_translation["Please wait"]);

					
							
						
						$.ajax({
							url:form.attr("action"),
							type: "POST",
							data:form.serialize(),
							success: function (response) {
                         
								$('#messages-body').append(response);
								$('#chat-form input:not([name="_token"]),#chat-form textarea').val('');
									KTUtil.btnRelease(formSubmitButton);

									scrollDiv.scrollTop = scrollDiv.scrollHeight;
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
	
					} else {
				
					}
				});
			}


	







		});
	



        // دالة لتحميل الخدمات
        function _loadMoreMessages() {
          
	
    
     

                    $.ajax({
                url: load_messages_route +'?page=' + page++,
                type: 'GET',
                success: function(response) {
                    
                    $('#messages-body').prepend(response);
                    
                   
                }
            }).then(function () {
				if (scrollDiv && page==2) {
					scrollDiv.scrollTop = scrollDiv.scrollHeight;
					  
			   
					   // Initialize PerfectScrollbar
					   const ps = new PerfectScrollbar(scrollDiv);
			   
					   // Update PerfectScrollbar after setting scroll position
					   ps.update();
			   
					   // Verify scrollTop value after PerfectScrollbar updates
					   
				}
			});
                
            
            
       
        }
 
        function _addNewSentMessage() {
          
	  
                    $('#messages-body').prepend(`
						
						
						`);
          
        }


		function _ChangeSeenIconWhenRead() {
          
			$(".seen_icon").removeClass("fa-check")
            $(".seen_icon").addClass("fa-check-double text-success")
          
        }
		function _markMessageAsRead(message_id) {
          
	
			$.ajax({
                url: mark_message_as_read_route,
                type: 'POST',
				data: {
					"message_id":message_id,
					"_token":csrf_token,
				},
                success: function(response) {
					window.channel
					.whisper('seen', {
						typing: true,
					});
	
                }
            }).then(function(){
				$('#user_chats').load('/chat/message/chats/load');
			})
          
        }
