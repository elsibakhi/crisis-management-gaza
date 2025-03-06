"use strict";

// Class Definition
var KTLogin = function() {
	var _buttonSpinnerClasses = 'spinner spinner-right spinner-white pr-15';

	var _handleFormSignin = function() {
		var form = KTUtil.getById('login-form');
		var formSubmitUrl = KTUtil.attr(form, 'action');
		var formSubmitButton = KTUtil.getById('login-form-btn');

		if (!form) {
			return;
		}

		FormValidation
		    .formValidation(
		        form,
		        {
		            fields: {
						email: {
							validators: {
								notEmpty: {
									message: system_translation["Email is required"]
									
								}
							}
						},
						password: {
							validators: {
								notEmpty: {
									message: system_translation["Password is required"]
								}
							}
						}
		            },
		            plugins: {
						trigger: new FormValidation.plugins.Trigger(),
						submitButton: new FormValidation.plugins.SubmitButton(),
	            		//defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
						bootstrap: new FormValidation.plugins.Bootstrap({
						//	eleInvalidClass: '', // Repace with uncomment to hide bootstrap validation icons
						//	eleValidClass: '',   // Repace with uncomment to hide bootstrap validation icons
						})
		            }
		        }
		    )
		    .on('core.form.valid', function() {
				// Show loading state on button

			
				 KTUtil.btnWait(formSubmitButton, _buttonSpinnerClasses, system_translation["Please wait"]);
			
				// Create an object with form data
				var formData = {
					email: form.querySelector('[name="email"]').value,
					password: form.querySelector('[name="password"]').value,
					_token: form.querySelector('[name="_token"]').value,
				};
			
				// Make an AJAX request
				$.ajax({
					url: formSubmitUrl,
					type: 'POST',
					dataType: 'json',
					data: formData,
					success: function (response) {
						// Release button
						KTUtil.btnRelease(formSubmitButton);
			
						if (response) {
							Swal.fire({
								text: system_translation["All is cool! Now you submit this form"],
								icon: "success",
								buttonsStyling: false,
								confirmButtonText: system_translation["Ok, got it!"],
								customClass: {
									confirmButton: "btn font-weight-bold btn-light-primary"
								}
							}).then(function () {
								window.location.href = routes.home_url;
							});
						} else {
					
							Swal.fire({
								text: system_translation["Sorry, something went wrong, please try again"],
								icon: "error",
								buttonsStyling: false,
								confirmButtonText: system_translation["Ok, got it!"],
								customClass: {
									confirmButton: "btn font-weight-bold btn-light-primary"
								}
							}).then(function () {
								KTUtil.scrollTop();
							});
						}
					},
					error: function (error) {
						// Release button
						KTUtil.btnRelease(formSubmitButton);
			
						Swal.fire({
							text: error.responseJSON.message,
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: system_translation["Ok, got it!"],
							customClass: {
								confirmButton: "btn font-weight-bold btn-light-primary"
							}
						});
					}
				});
			})
			
			.on('core.form.invalid', function() {
				Swal.fire({
					text: system_translation["Sorry, looks like there are some errors detected, please try again"],
					icon: "error",
					buttonsStyling: false,
					confirmButtonText: system_translation["Ok, got it!"],
					customClass: {
						confirmButton: "btn font-weight-bold btn-light-primary"
					}
				}).then(function() {
					KTUtil.scrollTop();
				});
		    });
    }
	var _handleFormResetPassword = function() {
		var form = KTUtil.getById('reset-password-form');
		var formSubmitUrl = KTUtil.attr(form, 'action');
		var formSubmitButton = KTUtil.getById('reset-password-form-btn');

		if (!form) {
			return;
		}

		FormValidation
		    .formValidation(
		        form,
		        {
		            fields: {
						email: {
							validators: {
								notEmpty: {
									message: system_translation["Email is required"]
									
								}
							}
						},
						"password_confirmation": {
							validators: {
								notEmpty: {
									message: system_translation["Password Confirmation is required"]
								}
							}
						},
						password: {
							validators: {
								notEmpty: {
									message: system_translation["Password is required"]
								}
							}
						},
					
					
		            },
		            plugins: {
						trigger: new FormValidation.plugins.Trigger(),
						submitButton: new FormValidation.plugins.SubmitButton(),
	            		//defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
						bootstrap: new FormValidation.plugins.Bootstrap({
							eleInvalidClass: '', // Repace with uncomment to hide bootstrap validation icons
							eleValidClass: '',   // Repace with uncomment to hide bootstrap validation icons
						})
		            }
		        }
		    )
		    .on('core.form.valid', function() {
				// Show loading state on button

			
				 KTUtil.btnWait(formSubmitButton, _buttonSpinnerClasses, system_translation["Please wait"]);
				 
		
				
				// Make an AJAX request
				$.ajax({
					url: formSubmitUrl,
					type: 'POST',
					dataType: 'json',
					data:  $("#reset-password-form").serialize(),
					success: function (response) {
						// Release button
						KTUtil.btnRelease(formSubmitButton);
			
						if (response) {
							Swal.fire({
								text: system_translation["Now that you’ve reset your password, please log in using the new one"],
								icon: "success",
								buttonsStyling: false,
								confirmButtonText: system_translation["Ok, got it!"],
								customClass: {
									confirmButton: "btn font-weight-bold btn-light-primary"
								}
							}).then(function () {
								window.location.href = routes.login_url;
							});
						} else {
					
							Swal.fire({
								text: system_translation["Sorry, something went wrong, please try again"],
								icon: "error",
								buttonsStyling: false,
								confirmButtonText: system_translation["Ok, got it!"],
								customClass: {
									confirmButton: "btn font-weight-bold btn-light-primary"
								}
							}).then(function () {
								KTUtil.scrollTop();
							});
						}
					},
					error: function (error) {
						// Release button
						KTUtil.btnRelease(formSubmitButton);
			
						Swal.fire({
							text: error.responseJSON.message,
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: system_translation["Ok, got it!"],
							customClass: {
								confirmButton: "btn font-weight-bold btn-light-primary"
							}
						});
					}
				});
			})
			
			.on('core.form.invalid', function() {
				Swal.fire({
					text: system_translation["Sorry, looks like there are some errors detected, please try again"],
					icon: "error",
					buttonsStyling: false,
					confirmButtonText: system_translation["Ok, got it!"],
					customClass: {
						confirmButton: "btn font-weight-bold btn-light-primary"
					}
				}).then(function() {
					KTUtil.scrollTop();
				});
		    });

			
    }

	var _handleFormForgot = function() {
		var form = KTUtil.getById('kt_login_forgot_form');
		var formSubmitUrl = KTUtil.attr(form, 'action');
		var formSubmitButton = KTUtil.getById('kt_login_forgot_form_submit_button');

		if (!form) {
			return;
		}

		FormValidation
		    .formValidation(
		        form,
		        {
		            fields: {
						email: {
							validators: {
								notEmpty: {
									message: system_translation['Email is required']
								},
								emailAddress: {
									message: system_translation['The value is not a valid email address']
								}
							}
						}
		            },
		            plugins: {
						trigger: new FormValidation.plugins.Trigger(),
						submitButton: new FormValidation.plugins.SubmitButton(),
	            		//defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
						bootstrap: new FormValidation.plugins.Bootstrap({
						//	eleInvalidClass: '', // Repace with uncomment to hide bootstrap validation icons
						//	eleValidClass: '',   // Repace with uncomment to hide bootstrap validation icons
						})
		            }
		        }
		    )
		    .on('core.form.valid', function() {
				// Show loading state on button
				KTUtil.btnWait(formSubmitButton, _buttonSpinnerClasses, system_translation["Please wait"]);

				// Simulate Ajax request
				setTimeout(function() {
					KTUtil.btnRelease(formSubmitButton);
				}, 2000);

					// Create an object with form data
					var formData = {
						email: form.querySelector('[name="email"]').value,
						
						_token: form.querySelector('[name="_token"]').value,
					};
				
					// Make an AJAX request
					$.ajax({
						url: formSubmitUrl,
						type: 'POST',
						dataType: 'json',
						data: formData,
						success: function (response) {
							// Release button
							KTUtil.btnRelease(formSubmitButton);
				
							if (response) {
								Swal.fire({
									text: system_translation["I have sent you a recovery email. Please check your inbox to reset your password"],
									icon: "success",
									buttonsStyling: false,
									confirmButtonText: system_translation["Ok, got it!"],
									customClass: {
										confirmButton: "btn font-weight-bold btn-light-primary"
									}
								}).then(function () {
									window.location.href = routes.home_url;
								});
							} else {
						
								Swal.fire({
									text: system_translation["Sorry, something went wrong, please try again"],
									icon: "error",
									buttonsStyling: false,
									confirmButtonText: system_translation["Ok, got it!"],
									customClass: {
										confirmButton: "btn font-weight-bold btn-light-primary"
									}
								}).then(function () {
									KTUtil.scrollTop();
								});
							}
						},
						error: function (error) {
							// Release button
							KTUtil.btnRelease(formSubmitButton);
				
							Swal.fire({
								text: error.responseJSON.message,
								icon: "error",
								buttonsStyling: false,
								confirmButtonText: system_translation["Ok, got it!"],
								customClass: {
									confirmButton: "btn font-weight-bold btn-light-primary"
								}
							});
						}
					});
		    })
			.on('core.form.invalid', function(error) {
				Swal.fire({
					text: error.responseJSON.message,
					icon: "error",
					buttonsStyling: false,
					confirmButtonText: system_translation["Ok, got it!"],
					customClass: {
						confirmButton: "btn font-weight-bold btn-light-primary"
					}
				}).then(function() {
					KTUtil.scrollTop();
				});
		    });
    }

	var _handleFormSignup = function() {
		// Base elements
		var wizardEl = KTUtil.getById('kt_login');
		var form = KTUtil.getById('register-form');
		var wizardObj;
		var validations = [];

		if (!form) {
			return;
		}

		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		// Step 1
		validations.push(FormValidation.formValidation(
			form,
			{
				fields: {
					password: {
						validators: {
							notEmpty: {
								message: system_translation['Password is required']
							}
						}
					},
					password_confirmation: {
						validators: {
							notEmpty: {
								message: system_translation['Password Confirmation is required']
							}
						}
					},
					name: {
						validators: {
							notEmpty: {
								message: system_translation['Name is required']
							},
							
						}
					},
					
					email: {
						validators: {
							notEmpty: {
								message: system_translation['Email is required']
							},
							emailAddress: {
								message: system_translation['The value is not a valid email address']
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));
		// Step 2
		validations.push(FormValidation.formValidation(
			form,
			{
				fields: {
					address: {
						validators: {
							notEmpty: {
								message: system_translation['Address is required']
							}
						}
					},
					
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));
		// Initialize form wizard
		wizardObj = new KTWizard(wizardEl, {
			startStep: 1, // initial active step number
			clickableSteps: false , // allow step clicking
			

		});
		function pushDataToCompleteStep() {
			var formData = {
				email: form.querySelector('[name="email"]').value,
				address: form.querySelector('[name="address"]').value,
				name: form.querySelector('[name="name"]').value,
				
				
			};
		
			$('#email-label').text(formData.email);
			$('#address-label').text(formData.address);
			
			$('#name-label').text(formData.name);
			
			
		}
		// Validation before going to next page
		wizardObj.on('change', function (wizard) {
			if (wizard.getStep() > wizard.getNewStep()) {
				return; // Skip if stepped back
			}

			// Validate form before change wizard step
			var validator = validations[wizard.getStep() - 1]; // get validator for currnt step

			if (validator) {
				validator.validate().then(function (status) {
					if (status == 'Valid') {
						
						pushDataToCompleteStep();
						wizard.goTo(wizard.getNewStep());
						KTUtil.scrollTop();
					} else {
						KTUtil.scrollTop();
						
					}
				});
			}

			return false;  // Do not change wizard step, further action will be handled by he validator
		});

		// Change event
		wizardObj.on('changed', function (wizard) {
			KTUtil.scrollTop();
		});

		// Submit event

		// Submit event
		wizardObj.on('submit', function (wizard) {
			// Send the form data directly as an AJAX request
			$.ajax({
				url: routes.register_url,
				type: 'POST',
				data: $(form).serialize(),
				success: function (response) {
					if (response) {
			
						Swal.fire({
							text: system_translation["Form submitted successfully!"],
							icon: "success",
							buttonsStyling: false,
							confirmButtonText: system_translation["Ok, got it!"],
							customClass: {
								confirmButton: "btn font-weight-bold btn-primary",
							}
						}).then(function () {
							window.location.href = routes.home_url;
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
		});
		
	};

	var _handleFormEmailVerificationResend = function() {
	
		

		$("#email_verification_resend").on('submit', function (event) {
			event.preventDefault();
			var formSubmitButton = KTUtil.getById('email_verification_resend_button');
			var _buttonSpinnerClasses = 'spinner spinner-right spinner-white pr-15';
			KTUtil.btnWait(formSubmitButton, _buttonSpinnerClasses, system_translation["Please wait"]);
$.ajax({
	url:$("#email_verification_resend").attr("action"),
	type: "POST",
	data: $("#email_verification_resend").serialize(),
	success: function (response) {
		if (response) {
			KTUtil.btnRelease(formSubmitButton);
			$("#email_sent_alert").removeClass("d-none")

		
		} else {
			// Handle server-side validation errors or other errors
			KTUtil.btnRelease(formSubmitButton);
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
	error: function (error) {
		// Handle AJAX request error
		KTUtil.btnRelease(formSubmitButton);
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
		})
		
	};

    // Public Functions
    return {
        init: function() {
			_handleFormEmailVerificationResend();
            _handleFormSignin();
			_handleFormForgot();
			_handleFormSignup();
			_handleFormResetPassword();
		
        }
    };
}();

// Class Initialization
jQuery(document).ready(function() {
    KTLogin.init();
});
