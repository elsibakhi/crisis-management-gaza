"use strict";

// Class definition
var KTWizard2 = function () {
	// Base elements
	var _wizardEl;
	var _formEl;
	var _wizardObj;
	var _validations = [];


    // Private functions
    var _initValidation = function () {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        // Step 1
        _validations.push(FormValidation.formValidation(
            _formEl,
            {
                fields: {
                    selectedWorkday: {

                        validators: {
                            choice: {
                                min: 1,
                                message: 'Please select a working day'
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
        _validations.push(FormValidation.formValidation(
            _formEl,
            {
                fields: {
                    requestedDate: {
                        validators: {
                            notEmpty: {
                                message: 'the date  is required'
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
                    startDateTime: {
                        validators: {
                            notEmpty: {
                                message: 'Booking start time is required'
                            }
                        }
                    },
                    endDateTime: {
                        validators: {
                            notEmpty: {
                                message: 'Booking end time  is required'
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


    }


	// Private functions
	var _initWizard = function () {
		// Initialize form wizard
		_wizardObj = new KTWizard(_wizardEl, {
			startStep: 1, // initial active step number
			clickableSteps: false // to make steps clickable this set value true and add data-wizard-clickable="true" in HTML for class="wizard" element
		});

        function getAllDayNumbersExcept(selectedDay) {
            // Define an array of day names in the desired order
            const daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

            // Find the index of the input day string in the array
            const index = daysOfWeek.findIndex(day => day.toLowerCase() === selectedDay.toLowerCase());

            // Calculate the day numbers (1 to 7) except the one specified
            const dayNumbers = [];
            for (let i = 1; i <= 7; i++) {
                if (i !== (index + 1)) {
                    dayNumbers.push(i);
                }
            }

            return dayNumbers;
        }

        // Validation before going to next page

        var myChart = null;
        _wizardObj.on('change', function (wizard) {
            let step = wizard.getStep();



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
                        switch (step) {

                            case 1:


                                let day = $('.selectedWorkdays_radios').is(':checked') ? $(".selectedWorkdays_radios:checked").val() : undefined;


                                if (typeof day === "undefined") {

                                    return false;
                                }


                                // i remove date picker and add it again to reset the past settings
                                var elementToRemove = $('#input_01');
                                elementToRemove.val("");
                                // $("#is_team_checkbox").removeAttr("checked");
                                $('#is_team_checkbox').prop('checked', false);
                                document.getElementById("seats_number_input").setAttribute("disabled", "disabled");
                                $("#seats_div").fadeOut();
                                $('#seats_number_input').val(1);
                                elementToRemove.remove();
                                $('#removed_date').append(elementToRemove);

                            // END OF RESET SETTINGS

                                $.get(`/user/bookings/firstStep?day=${day}`, function (data, status) {

                                    let formated_dates = []; // reformat the date to Suits datepicker format
                                    for (const key in data.holidays[0]) {

                                        let date = data.holidays[0][key].split("-");
                                        date[1]-= 1; //when the month that i get is 10 then it shown in datepicker as 9
                                        formated_dates.push(date);

                                    }


                                    var $input = $('.datepicker').pickadate({
                                        formatSubmit: 'yyyy-mm-dd',
                                        // editable: true,
                                        closeOnSelect: true,
                                        closeOnClear: true,

                                        min: new Date(),
                                        disable: [
                                            ...getAllDayNumbersExcept(data.day),
                                            ...formated_dates

                                        ]

                                    })

                                    var picker = $input.pickadate('picker')



                                    picker.open()





                                });
                                break;


                            case 2:

                                $('#start_input_from').val("");
                                $('#end_input_from').val("");
                                let date = $("#input_01").val();
                                let is_team = false;
                                let seats_number = $("#seats_number_input").val();

                                if ($('#is_team_checkbox').prop('checked')) {
                                    is_team = true;

                                } else {
                                    is_team = false;
                                }

                                let workDay_id = $(".selectedWorkdays_radios:checked").attr("data-id");
                                $.get(`/user/bookings/${workDay_id}/secondStep?date=${date}&is_team=${is_team}&seats_number=${seats_number}`, function (responseData, status) {


                                    const data = [];


                                    for (let hour in responseData) {
                                        data.push({
                                            selfHour: hour
                                            , backgroundColor: responseData[hour]["abilityOfBooking"] ? 'rgba(75, 192, 192, 0.2)' : 'rgba(255, 99, 132, 0.2)'
                                            , borderColor: responseData[hour]["abilityOfBooking"] ? 'rgb(75, 192, 192)' : 'rgb(255, 99, 132)'
                                            , remaining_seates: responseData[hour]["availableSeats"]
                                        });
                                    }





                                    if (myChart != null) {

                                        myChart.destroy();
                                    }

                              myChart =  new Chart(
                                        document.getElementById('acquisitions'),
                                        {
                                            type: 'bar',
                                            options: {
                                                animation: false,
                                                plugins: {
                                                    legend: {
                                                        display: false
                                                    },
                                                    tooltip: {
                                                        enabled: false
                                                    },

                                                },
                                                scales: {
                                                    y: {
                                                        title: {
                                                            display: true,
                                                            text: 'Available seats', // Your y-axis label
                                                            font: {
                                                                size: 14, // Optional, specify the font size
                                                            },
                                                        },
                                                    },
                                                },
                                            },
                                            data: {
                                                labels: data.map(row => row.selfHour),
                                                datasets: [{
                                                    label: 'My First Dataset',
                                                    data: data.map(row => row.remaining_seates),
                                                    barPercentage: 0.6,
                                                    categoryPercentage: 1,

                                                    backgroundColor: data.map(row => row.backgroundColor),
                                                    borderColor: data.map(row => row.borderColor),
                                                    borderWidth: 1
                                                }]
                                            }
                                        }
                                    );








                                    // for (let hour in responseData) {
                                    //     data.push({
                                    //         selfHour: hour
                                    //         , backgroundColor: responseData[hour]["abilityOfBooking"] ? 'rgba(75, 192, 192, 0.2)' : 'rgba(255, 99, 132, 0.2)'
                                    //         , borderColor: responseData[hour]["abilityOfBooking"] ? 'rgb(75, 192, 192)' : 'rgb(255, 99, 132)'
                                    //         , remaining_seates: responseData[hour]["availableSeats"]
                                    //     });
                                    // }


                                    // console.log(`${responseData["start_time"]}0000`)
                                    var $input2 = $('.timepicker').pickatime({
                                        formatSubmit: 'HH:i:00',
                                        closeOnSelect: true,
                                        closeOnClear: true,
                                        theme: "inline",
                                        interval: 60,
                                    })
                                    // var picker2 = $input2.pickatime('picker2')
                                    // picker2.open()






                                });


                                break;

                            case 3:



                                $("#workingDay_review").text("Working day : "+$('#kt_form').find('input[name="selectedWorkday"]:checked').val());
                                $("#bookingDate_review").text("Booking date : " +$('#kt_form').find('input[name="requestedDate"]').val());
                                $("#seatsNumber_review").text("Seats Number : " +$('#kt_form').find('input[name="demandSeats"]').val());
                                $("#startTime_review").text("Start time : " +$('#kt_form').find('input[name="startDateTime"]').val());
                                $("#endTime_review").text("End time : " +$('#kt_form').find('input[name="endDateTime"]').val());

                                break;


                            default:
                                break;
                        }



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
			Swal.fire({
				text: "All is good! Please confirm the form submission.",
				icon: "success",
				showCancelButton: true,
				buttonsStyling: false,
				confirmButtonText: "Yes, submit!",
				cancelButtonText: "No, cancel",
				customClass: {
					confirmButton: "btn font-weight-bold btn-primary",
					cancelButton: "btn font-weight-bold btn-default"
				}
			}).then(function (result) {
				if (result.value) {
					// _formEl.submit(); // Submit form
					var formData = $("#kt_form").serialize();
					var url =$("#kt_form").attr('action');
					var day_id = $('.selectedWorkdays_radios').is(':checked') ? $('.selectedWorkdays_radios:checked').attr('data-id') : undefined;
					formData+=`&day_id=${day_id}`;
					$.ajax({
						type: "post",
						url: url,
						data: formData,
						success: function (data) {
						  if (data.status == "200") {
							toastr.success(data.message);
                            setTimeout(function(){ window.location.href = "/user/user/bookings/index"; }, 4000);

						  } else {
							toastr.error(data.message);
						  }
						},
						error: function (error) {
							$.each(error.responseJSON.errors, function(index, value) {
								toastr.error(value);
							});
						},
					  });
				} else if (result.dismiss === 'cancel') {
					Swal.fire({
						text: "Your form has not been submitted!.",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Ok, got it!",
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

			_initWizard();
			_initValidation();
		}
	};
}();

jQuery(document).ready(function () {
    KTWizard2.init();
    isTeam_enable()
});



function isTeam_enable() {
    let checkboxe = document.getElementById("is_team_checkbox");


         checkboxe.onchange = function () {
             if (checkboxe.checked) {
                document.getElementById("seats_number_input").removeAttribute("disabled");
                 $("#seats_div").fadeIn();
            } else {
                document.getElementById("seats_number_input").setAttribute("disabled", "disabled");
                $("#seats_div").fadeOut();
            }

        }



}
