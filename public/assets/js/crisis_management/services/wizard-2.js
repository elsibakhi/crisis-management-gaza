"use strict";

// Class definition
var KTUppy = function () {
	const Tus = Uppy.Tus;
	const ProgressBar = Uppy.ProgressBar;
	const StatusBar = Uppy.StatusBar;
	const FileInput = Uppy.FileInput;
	const Informer = Uppy.Informer;

	// to get uppy companions working, please refer to the official documentation here: https://uppy.io/docs/companion/
	const Dashboard = Uppy.Dashboard;
	const Dropbox = Uppy.Dropbox;
	const GoogleDrive = Uppy.GoogleDrive;
	const Instagram = Uppy.Instagram;
	const Webcam = Uppy.Webcam;
	var form = KTUtil.getById('kt_form');
	// Private functions
	var initUppy1 = function(){
		var id = '#kt_uppy_1';

		var options = {
			proudlyDisplayPoweredByUppy: false,
			target: id,
			inline: true,
			
			replaceTargetContent: true,
			showProgressDetails: true,
			note: '.png , .jpg , .jpeg',
			width: 400,
			height: 450,
			metaFields: [
				{ id: 'name', name: 'Name', placeholder: 'file name' },
				{ id: 'caption', name: 'Caption', placeholder: 'describe what the image is about' }
			],
            browserBackButtonClose: true,
            showRemoveButtonAfterComplete: true, // تأكد من تفعيل هذه الخاصية لظهور زر الحذف
		}

		window.uppyDashboard = Uppy.Core({
			autoProceed: true,
			restrictions: {
				maxFileSize: 10000000, // 10mb
				
			maxNumberOfFiles:4 ,
			minNumberOfFiles:0 ,
			allowedFileTypes:[ '.jpg', '.jpeg', '.png'] ,
			}
		});

		window.uppyDashboard.use(Dashboard, options);
		window.uppyDashboard.use(Tus, { endpoint: 'https://master.tus.io/files/' });
		window.uppyDashboard.use(GoogleDrive, { target: Dashboard, companionUrl: 'https://companion.uppy.io' });
		window.uppyDashboard.use(Dropbox, { target: Dashboard, companionUrl: 'https://companion.uppy.io' });
		window.uppyDashboard.use(Instagram, { target: Dashboard, companionUrl: 'https://companion.uppy.io' });
		window.uppyDashboard.use(Webcam, { target: Dashboard });

	}



	return {
		// public functions
		init: function() {
			initUppy1();
	

		}
	};
}();


    // ----------------start wizard 

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
                        title: {
    
                            validators: {
                                notEmpty: {
                                    
                                    message: system_translation['Title is required']
                                },
                                stringLength: {
                                    min:1,
                                    max:100,
                                    message: system_translation['The number of letters must be between 1 and 100']
                                },
                            }
                        },
                        description: {
    
                            validators: {
                               
                                stringLength: {
                                    min:1,
                                    max:500,
                                    message: system_translation['The number of letters must be between 1 and 500']
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
                    }
                }
            ));
    
           
    
            // Step 2
            _validations.push(FormValidation.formValidation(
                _formEl,
                {
                    fields: {
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
                    },
                    plugins: {
               
                    }
                }
            ));
    
            // Step 3
            let minDay;
            if(type=="Edit"){
                 minDay = last_start_date;
            }else{
    
                 minDay = new Date();
            }
    
            _validations.push(FormValidation.formValidation(
                _formEl,
                {
                    fields: {
                        start_date: {
                            validators: {
                                notEmpty: {
                                    message: system_translation['Start date is required']
                                },
                                date: {
                                    format: 'YYYY-MM-DD',
                                    message: system_translation['The value is not a valid date'],
                                    min: minDay,
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
                        period: {
                            validators: {
                                notEmpty: {
                                    message: system_translation['Period is required']
                                },
                                numeric: {
                                    message: system_translation['the vlaue must be numeric']
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
    
    
    
           
            var step4_fields;
            switch (institution_type) {
                case "food":
                    step4_fields={ 
                        
                        type: {
                        validators: {
                            notEmpty: {
                                message: system_translation['Type is required']
                            },
                            choice : {
                                message: system_translation['the input must be a choice']
                            },
                        }
                    },
                
                };
                    break;
                case "education":
                    if(type == "Edit"){
                        step4_fields={
    
                            status: {
                                validators: {
                                    notEmpty: {
                                        message: system_translation['Status is required']
                                    },
                                    choice : {
                                        message: system_translation['the input must be a choice']
                                    }
                                }
                            },
        
                            
        
    
        
                        };
                    }else{
                        step4_fields={
    
                            status: {
                                validators: {
                                    notEmpty: {
                                        message: system_translation['Status is required']
                                    },
                                    choice : {
                                        message: system_translation['the input must be a choice']
                                    }
                                }
                            },
        
                            
        
                            'specializations[][name]': {
                                validators: {
                                    notEmpty: {
                                        message: system_translation['Specializations is required']
                                    }
                                }
                            },
                            'targets[][name]': {
                                validators: {
                                    notEmpty: {
                                        message: system_translation['Targets is required']
                                    }
                                }
                            },
        
                        };
                    }
                
                    break;
                case "health":
                    if(type == "Edit"){
                        step4_fields={
    
                            type: {
                                validators: {
                                    notEmpty: {
                                        message: system_translation['Type is required']
                                    },
                                    choice : {
                                        message: system_translation['the input must be a choice']
                                    }
                                }
                            },
           
        
                        };
                    }else{
                        step4_fields={
    
                            type: {
                                validators: {
                                    notEmpty: {
                                        message: system_translation['Type is required']
                                    },
                                    choice : {
                                        message: system_translation['the input must be a choice']
                                    }
                                }
                            },
                            'fields[][name]': {
                                validators: {
                                    notEmpty: {
                                        message: system_translation['Fields is required']
                                    }
                                }
                            },
        
                        };
    
                    }
          
                    break;
            
           
            }
    
            // Step 4
            _validations.push(FormValidation.formValidation(
                _formEl,
                {
                    fields: step4_fields,
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
    


            _validations.push(FormValidation.formValidation(
                _formEl,
                {
                    fields: {
               
    
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
    
    
    
            // Validation before going to next page
    
         
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
                const specializations = document.querySelectorAll('.input-container'+1+":not(:first-of-type) input");
                const targets = document.querySelectorAll('.input-container'+2+":not(:first-of-type) input");
                const fields = document.querySelectorAll('.input-container'+3+":not(:first-of-type) input");
               
                specializations.forEach(element => {
                    if (element.value.trim() === "") {
                        element.parentElement.remove();
                       
                    }
                    });
                    targets.forEach(element => {
                    if (element.value.trim() === "") {
                        element.parentElement.remove();
                       
                    }
                    });
                    fields.forEach(element => {
                    if (element.value.trim() === "") {
                        element.parentElement.remove();
                       
                    }
                    });
                
                var formSubmitButton = KTUtil.getById('submitBtn');
                var _buttonSpinnerClasses = 'spinner spinner-right spinner-white pr-15';
                KTUtil.btnWait(formSubmitButton, _buttonSpinnerClasses, system_translation["Please wait"]);
    
                // Simulate Ajax request
                setTimeout(function() {
                    KTUtil.btnRelease(formSubmitButton);
                }, 1000);
    
    
        var form = KTUtil.getById('kt_form');
        var formData = new FormData(form); // إنشـاء FormData وجمع بيانات الفورم
      
        // إضافة الملفات التي تم جمعها من Uppy إلى formData
        window.uppyDashboard.getFiles().forEach((file) => {
            formData.append('files[]', file.data, file.name); // إضافة كل ملف إلى FormData
        });
       
        // إرسال الطلب عبر AJAX
        $.ajax({
            url: $(form).attr("action"),
            type: "POST",
            data: formData,           // استخدام FormData مع بيانات الفورم
            processData: false,       // تعطيل المعالجة التلقائية للبيانات
            contentType: false,       // تعطيل نوع المحتوى التلقائي
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
                        if (type == "Edit") {
                            window.location.href = routes.services_url;
                        } else {
                            // إعادة تعيين الفورم وتحديث العناصر
                            $('#Services').modal('hide');
                            wizard.goTo(1);
                            $('#kt_datatable').DataTable().draw();
                            $('input:not([name="_token"]):not([name="address"]):not([name="lng"]):not([name="lat"]):not([type="checkbox"]), textarea').val('');
                            $('select.form-control').val('');
                            $('input[type="checkbox"]').prop('checked', false);
                            $('.input-container1').slice(1).remove();
                            $('.input-container2').slice(1).remove();
                            $('.input-container3').slice(1).remove();
                            document.getElementById('costField').style.display = 'none';
                                //Cancel all uploads, reset progress and remove all file
                            window.uppyDashboard.cancelAll()
                        }
                    });
                } else {
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
    
                _initWizard();
                _initValidation();
            }
        };
    }();
    
      
        
    
    
        // ------------ end wizard

jQuery(document).ready(function () {
    KTUppy.init();
    KTWizard2.init();
    if(type=="Edit"){

        addFilesToUppy(JSON.parse(lastFiles));
    }
});



