// Class definition
var KTFormControls = function () {
	// Private functions
    var _initDemo1 = function () {
        FormValidation.formValidation(
            document.getElementById('kt_form_1'),
            {
                fields: {
                    name: {
                        validators: {
                            notEmpty: {
                                message: 'Name is required'
                            },

                        }
                    },
                    office: {
                        validators: {
                            notEmpty: {
                                message: 'Name is required'
                            },

                        }
                    },


                    total_seats: {
                        validators: {
                            notEmpty: {
                                message: 'Total seats is required'
                            },
                            digits: {
                                message: 'The velue is not a valid digits'
                            }
                        }
                    },





                    type: {
                        validators: {
                            notEmpty: {
                                message: 'Please select an option'
                            }
                        }
                    },

                    options: {
                        validators: {
                            choice: {
                                min: 2,
                                max: 5,
                                message: 'Please select at least 2 and maximum 5 options'
                            }
                        }
                    },

                    memo: {
                        validators: {
                            notEmpty: {
                                message: 'Please enter memo text'
                            },
                            stringLength: {
                                min: 50,
                                max: 100,
                                message: 'Please enter a menu within text length range 50 and 100'
                            }
                        }
                    },

                    checkbox: {
                        validators: {
                            choice: {
                                min: 1,
                                message: 'Please kindly check this'
                            }
                        }
                    },



                    radios: {
                        validators: {
                            choice: {
                                min: 1,
                                message: 'Please kindly check this'
                            }
                        }
                    },

                    workingdays: {
                    	validators: {
                    		choice: {
                    			min:1,

                    			message: 'Please check at least 1 day'
                    		}
                    	}
                    },
                },

                plugins: { //Learn more: https://formvalidation.io/guide/plugins
                    trigger: new FormValidation.plugins.Trigger(),
                    // Bootstrap Framework Integration
                    bootstrap: new FormValidation.plugins.Bootstrap(),
                    // Validate fields when clicking the Submit button
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    // Submit the form when all fields are valid
                    defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
                }
            }
        );
    }
        var _initDemo2 = function () {
            FormValidation.formValidation(
                document.getElementById('kt_form_2'),
                {
                    fields: {
                        name: {
                            validators: {
                                notEmpty: {
                                    message: 'Name is required'
                                },

                            }
                        },


                        plugins: { //Learn more: https://formvalidation.io/guide/plugins
                            trigger: new FormValidation.plugins.Trigger(),
                            // Bootstrap Framework Integration
                            bootstrap: new FormValidation.plugins.Bootstrap(),
                            // Validate fields when clicking the Submit button
                            submitButton: new FormValidation.plugins.SubmitButton(),
                            // Submit the form when all fields are valid
                            defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
                        }
                    }
                }
            );
        }





	return {
		// public functions
		init: function() {
			_initDemo1();
			// _initDemo2();

		}
	};
}();

jQuery(document).ready(function() {
    KTFormControls.init();
    extension_enable();
    workdays_time_enable();
});

function extension_enable() {
    let checkboxes = document.getElementsByClassName("extension_checkboxes");


    for (let index = 0; index < checkboxes.length; index++) {
        let element = checkboxes[index];
        element.onchange = function () {
            if (element.checked) {
                document.getElementById(element.getAttribute("data-target")).removeAttribute("disabled");
            } else {
                document.getElementById(element.getAttribute("data-target")).setAttribute("disabled","disabled");
                }

        }

    }

}
function workdays_time_enable() {
    let checkboxes = document.getElementsByClassName("workdays_checkboxes");


    for (let index = 0; index < checkboxes.length; index++) {
        let element = checkboxes[index];
        element.onchange = function () {
            if (element.checked) {
           let time_inputs =  document.getElementsByClassName(element.getAttribute("data-target"));
                for (let index = 0; index < time_inputs.length; index++) {
                    time_inputs[index].removeAttribute("disabled");
                }
            } else {


                time_inputs = document.getElementsByClassName(element.getAttribute("data-target"));
                for (let index = 0; index < time_inputs.length; index++) {
                    time_inputs[index].setAttribute("disabled", "disabled");
                }
                }

        }

    }

}
