"use strict";



		// Submit event
		$("#news_form").on('submit', function (event) {
			event.preventDefault();

			var validator = FormValidation.formValidation(document.getElementById('news_form'), {
				fields: {
					title: {
						validators: {
							notEmpty: {
								message: system_translation['The title is required'],
							},
							stringLength: {
								min: 1,
								max: 100,
								message: system_translation['The title must be more than 0 and less than 100 characters long'],
							},
							
						},
					 },
					news: {
						validators: {
							notEmpty: {
								message: system_translation['The news is required'],
							},
							stringLength: {
								min: 1,
								max: 300,
								message: system_translation['The news must be more than 0 and less than 300 characters long'],
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



			var formSubmitButton = KTUtil.getById('modal_submit');
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
							url:$("#news_form").attr("action"),
							type: "POST",
							data: $("#news_form").serialize(),
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
										if(type=="Edit"){
											window.location.href = routes.news_url;
											
										}else{
											// hide the modal	
											$('#news').modal('hide');
										
				
											//reload datatable
											$('#kt_datatable').DataTable().draw();
				
											// reload the modal form
											$('input:not([name="_token"]), textarea').val('');
											$('select.form-control').val('');
											
										}
									
										
											
										
			
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
	




