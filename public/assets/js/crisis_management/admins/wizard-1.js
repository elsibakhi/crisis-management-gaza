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
	
									message: system_translation['Name is required']
								},
								stringLength: {
									min:1,
									max:50,
									message: system_translation['The number of letters must be between 1 and 50']
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
	
									message: system_translation['Name is required']
								},
								stringLength: {
									min:1,
									max:50,
									message: system_translation['The number of letters must be between 1 and 50']
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
					}
				}
			));

		}
	


		// Step 3
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					"roles[]": {
						validators: {
						
						}
					},
					"permissions[]": {
						validators: {
					
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
			KTUtil.btnWait(formSubmitButton, _buttonSpinnerClasses, system_translation["Please wait"]);

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
							text: system_translation["Form submitted successfully!"],
							icon: "success",
							buttonsStyling: false,
							confirmButtonText: system_translation["Ok, got it!"],
							customClass: {
								confirmButton: "btn font-weight-bold btn-primary",
							}
						}).then(function () {

							if(type=="Edit"){
								window.location.href = routes.admins_url;
								
							}else{
								// hide the modal	
								$('#Admins').modal('hide');
								wizard.goTo(1);
	
								//reload datatable
								$('#kt_datatable').DataTable().draw();
	
								// reload the modal form
								$('input:not([name="_token"])').val('');

								
								window.dualListbox1.remove_all_button.click()
								window.dualListbox2.remove_all_button.click()
								   // Reset checkboxes
								
								

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
