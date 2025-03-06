"use strict";

// Class definition
var KTWizard1 = function () {
	// Base elements
	var _wizardEl;
	var _formEl;
	var _wizardObj;
	var _validations = [];

	 
	// Private functions
	var _initValidation = function () {
		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		// Step 1
		if(type=="Edit"){
			_validations.push(FormValidation.formValidation(
				_formEl,
				{
					fields: {
						name: {
	
							validators: {
								notEmpty: {
	
									message: 'Name is required'
								}
							}
						},
						email: {
	
							validators: {
								notEmpty: {
	
									message: 'Email is required'
								},
								emailAddress: {
									message: 'The value is not a valid email address'
								}
							}
						},
						password: {
	
							validators: 
							  { 
							
							}
						},
						password_confirmation: {
	
							validators: {
						
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

		}else{
			_validations.push(FormValidation.formValidation(
				_formEl,
				{
					fields: {
						name: {
	
							validators: {
								notEmpty: {
	
									message: 'Name is required'
								}
							}
						},
						email: {
	
							validators: {
								notEmpty: {
	
									message: 'Email is required'
								},
								emailAddress: {
									message: 'The value is not a valid email address'
								}
							}
						},
						password: {
	
							validators: 
							  { notEmpty: {
	
									message: 'Password is required'
								}
							
							}
						},
						password_confirmation: {
	
							validators: {
								notEmpty: {
	
									message: 'Confirmed password is required'
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

		}
	

		// Step 2
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					address: {
						validators: {
							notEmpty: {
								message: 'Address is required'
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

		// Step 3
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					type: {
						validators: {
							notEmpty: {
								message: 'Please select a type'
							}
						}
					},
					phone: {
						validators: {
							notEmpty: {
								message: 'Phone is required'
							}
						},
						phone: {
							country: 'US',
							message: 'The value is not a valid  phone number'
						}
					},
					start_time: {
						validators: {
							notEmpty: {
								message: 'Start time is required'
							}
						}
					},
					end_time: {
						validators: {
							notEmpty: {
								message: 'End time is required'
							}
						}
					},
					description: {
						validators: {

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

		// Step 4

	}

	var _initWizard = function () {
		// Initialize form wizard
		_wizardObj = new KTWizard(_wizardEl, {
			startStep: 1, // initial active step number
			clickableSteps: false  // allow step clicking
		});

		// Validation before going to next page
		_wizardObj.on('change', function (wizard) {
			if (wizard.getStep() > wizard.getNewStep()) {
				return; // Skip if stepped back
			}

			// Validate form before change wizard step
			var validator = _validations[wizard.getStep() - 1]; // get validator for currnt step

			if (validator) {
				validator.validate().then(function (status) {
					if (status == 'Valid') {
						wizard.goTo(wizard.getNewStep());

						KTUtil.scrollTop();
					} else {
						Swal.fire({
							text: "Sorry, looks like there are some errors detected, please try again.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn font-weight-bold btn-light"
							}
						}).then(function () {
							KTUtil.scrollTop();
						});
					}
				});
			}

			return false;  // Do not change wizard step, further action will be handled by he validator
		});

		// Change event
		_wizardObj.on('changed', function (wizard) {
			KTUtil.scrollTop();
		});

		// Submit event
		_wizardObj.on('submit', function (wizard) {
			var formSubmitButton = KTUtil.getById('submitBtn');
			var _buttonSpinnerClasses = 'spinner spinner-right spinner-white pr-15';
			KTUtil.btnWait(formSubmitButton, _buttonSpinnerClasses, "Please wait");

			// Simulate Ajax request
			setTimeout(function() {
				KTUtil.btnRelease(formSubmitButton);
			}, 1000);
			var form = KTUtil.getById('kt_form');
				
			$.ajax({
				url: $(form).attr("action"),
				type: "POST",
				data: $(form).serialize(),
				success: function (response) {
					if (response) {

						Swal.fire({
							text: "Form submitted successfully!",
							icon: "success",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn font-weight-bold btn-primary",
							}
						}).then(function () {

							if(type=="Edit"){
								window.location.href = routes.institutions_url;
								
							}else{
								// hide the modal	
								$('#Institutions').modal('hide');
							
	
								//reload datatable
								$('#kt_institutions_datatable').DataTable().draw();
	
								// reload the modal form
								$('#institutionsModal').load('institutionsCreateModal');

							}

						});
					} else {
						// Handle server-side validation errors or other errors
						Swal.fire({
							text: "An error occurred while submitting the form.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!",
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
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn font-weight-bold btn-primary",
						}
					});
				}
			});







			// Swal.fire({
			// 	text: "All is good! Please confirm the form submission.",
			// 	icon: "success",
			// 	showCancelButton: true,
			// 	buttonsStyling: false,
			// 	confirmButtonText: "Yes, submit!",
			// 	cancelButtonText: "No, cancel",
			// 	customClass: {
			// 		confirmButton: "btn font-weight-bold btn-primary",
			// 		cancelButton: "btn font-weight-bold btn-default"
			// 	}
			// }).then(function (result) {
			// 	if (result.value) {
			// 		_formEl.submit(); // Submit form
			// 	} else if (result.dismiss === 'cancel') {
			// 		Swal.fire({
			// 			text: "Your form has not been submitted!.",
			// 			icon: "error",
			// 			buttonsStyling: false,
			// 			confirmButtonText: "Ok, got it!",
			// 			customClass: {
			// 				confirmButton: "btn font-weight-bold btn-primary",
			// 			}
			// 		});
			// 	}
			// });
		});
	}

	return {
		// public functions
		init: function () {
			_wizardEl = KTUtil.getById('kt_wizard');
			_formEl = KTUtil.getById('kt_form');

			_initValidation();
			_initWizard();
		}
	};
}();

jQuery(document).ready(function () {
	KTWizard1.init();
});
