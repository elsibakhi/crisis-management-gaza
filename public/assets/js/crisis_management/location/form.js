"use strict";



		// Submit event
		$("#location_form").on('submit', function (event) {
			event.preventDefault();
		
			var validator = FormValidation.formValidation(document.getElementById('location_form'), {
				fields: {
				
					
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
			

			var formSubmitButton = KTUtil.getById('location_submut_btn');
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
							url:$("#location_form").attr("action"),
							type: "POST",
							data: $("#location_form").serialize(),
							success: function (response) {
								
								if (response) {
			
									
								
										
										
								
				
											// reload the modal form
											$('#location_form input:not([name="_token"]),#location_form textarea').val('');
											const stars = document.querySelectorAll('.fa-star');
											stars.forEach(s => s.classList.remove('checked'));

											// hide the modal	
											$('#locationModal').modal('hide');

										    for (const key in load_routes) {
       
												load_section(key)
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
	




	