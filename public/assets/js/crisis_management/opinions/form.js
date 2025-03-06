"use strict";



		// Submit event
		$("#opinions_form").on('submit', function (event) {
			event.preventDefault();
		
			var validator = FormValidation.formValidation(document.getElementById('opinions_form'), {
				fields: {
				
					
					 opinion: {
						validators: {
							notEmpty: {
								message: system_translation['The opinion is required'],
							},
							stringLength: {
								min: 1,
								max: 500,
								message: system_translation['The opinion must be more than 0 and less than 500 characters long'],
							},
							
						},
					},
					 rating: {
						validators: {
							notEmpty: {
								message: system_translation['The rating is required'],
							},
							integer : {
								message: system_translation['The rating must be integer value'],
							},
							between  : {
								inclusive:true,
								min:1,
								max:5,
								message: system_translation['The rating must be a value between 1 and 5'],
							},
							
							
						},
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
			

			var formSubmitButton = KTUtil.getById('opinions_submut_btn');
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
							url: dummyUserCheckRoute,
							type: "GET",
							success: function (response) {
							 
								if (response.is_dummy_user) {
									$.ajax({
										url:$("#opinions_form").attr("action"),
										type: "POST",
										data: $("#opinions_form").serialize(),
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
						
											
													
													
							
							
														// reload the modal form
														$('#opinions_form input:not([name="_token"]),#opinions_form textarea').val('');
														const stars = document.querySelectorAll('.fa-star');
														stars.forEach(s => s.classList.remove('checked'));
			
														// hide the modal	
														$('#opinionsModal').modal('hide');
														
													
						
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

												// hide the modal	
												$('#opinionsModal').modal('hide');
												$('.fv-help-block').remove();
											
					
					
												// reload the modal form
												$('#opinions_form input:not([name="_token"]),#opinions_form textarea').val('');
												const stars = document.querySelectorAll('.fa-star');
												stars.forEach(s => s.classList.remove('checked'));
										}
									});
					
								} else {
								    // show the modal	
									$('#dummyUserModal').modal('show');
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
	




