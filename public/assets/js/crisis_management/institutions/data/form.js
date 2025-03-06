"use strict";



		// Submit event
		$("#data_form").on('submit', function (event) {
			event.preventDefault();

			var validator = FormValidation.formValidation(document.getElementById('data_form'), {
				fields: {
		
					 description: {
						validators: {
							
							stringLength: {
                                min:1,
                                max:500,
                                message: system_translation['The number of letters must be between 1 and 500']
                            },
						}
					},
					"workingDays[]": {
						validators: {
							
							choice: {
								min: 1,
								message: system_translation['Select at least one working day']
							},
						}
					},
					start_time: {
						validators: {
							notEmpty: {
								message: system_translation['Start time is required']
							}
						}
					},
				
					end_time: {
						validators: {
							notEmpty: {
								message: system_translation['End time is required']
							}
						}
					},
					address: {
						validators: {
							notEmpty: {
								message: system_translation['Address is required']
							},
							stringLength: {
                                min:1,
                                max:50,
                                message: system_translation['The number of letters must be between 1 and 50']
                            },
						}
					},
					region: {
						validators: {
							notEmpty: {
								message: system_translation['Region is required']
							},
							choice : {
								message: system_translation['the input must be a choice']
							}
						}
					},
					lat: {
						validators: {
							notEmpty: {
								message: system_translation['lat is required']
							},
							numeric: {
								message: system_translation['the vlaue must be numeric']
							},
						}
					},
					lng: {
						validators: {
							notEmpty: {
								message: system_translation['lng is required']
							},
							numeric: {
								message: system_translation['the vlaue must be numeric']
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
					},
			
	
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



			var formSubmitButton = KTUtil.getById('btn_submit');
			var _buttonSpinnerClasses = 'spinner spinner-right spinner-white pr-15';
			KTUtil.btnWait(formSubmitButton, _buttonSpinnerClasses, system_translation["Please wait"]);

			// Simulate Ajax request
			setTimeout(function() {
				KTUtil.btnRelease(formSubmitButton);
			}, 1000);
			// var form = KTUtil.getById('kt_form');
					// Validate form before change wizard step
			// var validator = _validations[0]; // get validator for currnt step

			if (validator) {
				validator.validate().then(function (status) {
					if (status == 'Valid') {
						$.ajax({
							url:$("#data_form").attr("action"),
							type: "POST",
							data: $("#data_form").serialize(),
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
									})
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
	




