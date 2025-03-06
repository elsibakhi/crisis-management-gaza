"use strict";



		// Submit event
		$("#profile_form").on('submit', function (event) {
			event.preventDefault();

			var validator = FormValidation.formValidation(document.getElementById('profile_form'), {
				fields: {
					name: {
						validators: {
							notEmpty: {
								message: system_translation['The name is required'],
							},
							stringLength: {
								min: 1,
								max: 200,
								message: system_translation['The name must be more than 0 and less than 200 characters long'],
							},
							
						},
					 },

					 
					phone: {
						validators: {
							
							phone: {
								country: 'US',
								message: system_translation['The value is not a valid  phone number']
							}
						},
						
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
					locale: {
						validators: {
							notEmpty: {
								message: system_translation['Please select a languge']
							},
							choice : {
								min: 1,
								message: system_translation['Please select a languge']
							},
						}
					},
					theme: {
						validators: {
							notEmpty: {
								message: system_translation['Please select a theme']
							},
							choice : {
								min: 1,
								message: system_translation['Please select a theme']
							},
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
							url:$("#profile_form").attr("action"),
							type: "POST",
							data: new FormData($("#profile_form")[0]), // Use FormData for multipart data
							processData: false, // Required for multipart
							contentType: false, // Required for multipart
							success: function (response) {
								KTUtil.btnRelease(formSubmitButton);
								if (response) {
			
									Swal.fire({
										text: system_translation["Form submitted successfully!"]+" "+system_translation["if you changed languge or theme you should refresh the page to see changes"],
										icon: "success",
										buttonsStyling: false,
										confirmButtonText: system_translation["Ok, got it!"],
										customClass: {
											confirmButton: "btn font-weight-bold btn-primary",
										}
									}).then(function(){
									
										if(response.reload){
	
										
												Swal.fire({
													title: system_translation["Do you want to reload the page to see the changes?"],
													
													
													icon: "warning",
													showCancelButton: true,
													confirmButtonText: system_translation["Yes, reload page!"],
													cancelButtonText: system_translation["No, cancel!"],
													reverseButtons: true
												}).then(function(result) {
													if (result.value) {
													
																location.reload()
													} 
												});
											
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

		// Submit event
		$("#change_password_form").on('submit', function (event) {
			event.preventDefault();

			var validator = FormValidation.formValidation(document.getElementById('change_password_form'), {
				fields: {
					password: {
	
						validators: 
						  { notEmpty: {

								message: system_translation['Password is required']
							}
						
						}
					},
					password_confirmation: {

						validators: {
							notEmpty: {

								message: system_translation['Confirmed password is required']
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
				},
			});



			var formSubmitButton = KTUtil.getById('change_password_btn');
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
							url:$("#change_password_form").attr("action"),
							type: "POST",
							data:$("#change_password_form").serialize(),
					
							success: function (response) {
								KTUtil.btnRelease(formSubmitButton);
								if (response) {

									if(response.status==403){
						
										   // show the modal	
									$('#checkPasswprdModal').modal('show');

									}else{
										Swal.fire({
											text:response.message,
											icon: "success",
											buttonsStyling: false,
											confirmButtonText: system_translation["Ok, got it!"],
											customClass: {
												confirmButton: "btn font-weight-bold btn-primary",
											}
										})

										$('#change_password_form input:not([name="_token"])').val('');
									}
				
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
		// Submit event
		$("#check_password_form").on('submit', function (event) {
			event.preventDefault();

			var validator = FormValidation.formValidation(document.getElementById('check_password_form'), {
				fields: {
					password: {
	
						validators: 
						  { notEmpty: {

								message: system_translation['Password is required']
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



			var formSubmitButton = KTUtil.getById('check_password_btn');
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
							url:$("#check_password_form").attr("action"),
							type: "GET",
							data:$("#check_password_form").serialize(),
					
							success: function (response) {
								KTUtil.btnRelease(formSubmitButton);
								if (response) {
									
									if(response.status){
										$('#checkPasswprdModal').modal('hide');
										$('#check_password_form input').val('');
										$("#change_password_form").submit()
									}else{
										Swal.fire({
											text: system_translation["This password does not match your password"],
											icon: "error",
											buttonsStyling: false,
											confirmButtonText: system_translation["Ok, got it!"],
											customClass: {
												confirmButton: "btn font-weight-bold btn-primary",
											}
										});

									}
							
									console.log(response.status)
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
	




