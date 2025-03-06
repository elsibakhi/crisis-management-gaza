"use strict";



		// Submit event
		$("#dummy_user_form").on('submit', function (event) {
			event.preventDefault();

			var validator = FormValidation.formValidation(document.getElementById('dummy_user_form'), {
				fields: {
					name: {
						validators: {
							notEmpty: {
								message: system_translation['The name is required'],
							},
							stringLength: {
								min: 1,
								max: 70,
								message: system_translation['The title must be more than 0 and less than 70 characters long'],
							},
							
						},
					 },
					 phone: {
						validators: {
							notEmpty: {
								message: system_translation['Phone is required']
							},
							phone: {
								country: 'US',
								message: system_translation['The value is not a valid  phone number']
							}
							
						},
					 }
					 
			
			
	
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
						// Bootstrap Framework Integration
						bootstrap: new FormValidation.plugins.Bootstrap({
							//eleInvalidClass: '',
							eleValidClass: '',
						})
				},
			});



			var formSubmitButton = KTUtil.getById('dummy_user_submut_btn');
            var _buttonSpinnerClasses = 'spinner spinner-right spinner-white pr-15';
            KTUtil.btnWait(formSubmitButton, _buttonSpinnerClasses, system_translation["Please wait"]);

            // Simulate Ajax request
            setTimeout(function() {
                KTUtil.btnRelease(formSubmitButton);
            }, 1000);
            var form = KTUtil.getById('dummy_user_form');
			// var form = KTUtil.getById('kt_form');
					// Validate form before change wizard step
			// var validator = _validations[0]; // get validator for currnt step

			if (validator) {
				validator.validate().then(function (status) {
					if (status == 'Valid') {
						$.ajax({
							url: $(form).attr("action"),
							type: "POST",
							data: $(form).serialize(),
							success: function(response) {
								if (response) {
			
									Swal.fire({
										text: system_translation["Form submitted successfully!"],
										icon: "success",
										buttonsStyling: false,
										confirmButtonText: system_translation["Ok, got it!"],
										customClass: {
											confirmButton: "btn font-weight-bold btn-primary",
										}
									}).then(function() {

										debugger
			
										// hide the modal	
										$('#dummyUserModal').modal('hide');
			
										$('#dummyUserModal input:not([name="_token"]), #dummyUserModal textarea').val('');
			
			
			
			
			
			
			
									});
								} else {
									// Handle server-side validation errors or other errors
									Swal.fire({
										text: system_translation["An error occurred while submitting the form"],
										icon: "error",
										buttonsStyling: false,
										confirmButtonText: system_translation["Ok, got it!"],
										customClass: {
											confirmButton: "btn font-weight-bold btn-primary",
										}
									});
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
					} else {
						Swal.fire({
							text: system_translation["Sorry, looks like there are some errors detected, please try again"],
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: system_translation["Ok, got it!"],
							customClass: {
								confirmButton: "btn font-weight-bold btn-light"
							}
						}).then(function () {
							KTUtil.scrollTop();
						});
					}
				});
			}


	







		});
	




