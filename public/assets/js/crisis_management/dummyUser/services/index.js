"use strict";



				
			var validator = FormValidation.formValidation(document.getElementById('service_search'), {
				fields: {
					'query': {
						validators: {
							notEmpty: {
								message: system_translation['This input is required'],
							},
							stringLength: {
								min: 1,
								max: 200,
								message: system_translation['This input must be more than 0 and less than 200 characters long'],
							},
							
						},
					 }
					 
			
			
	
				},
				plugins: {
				
				},
			});



			

			var form = KTUtil.getById('service_search');
			var searchInput = form.querySelector('#search_input');
			
			// إضافة مستمع الحدث على حقل الإدخال
			searchInput.addEventListener('keydown', function(event) {
			  // التحقق مما إذا كان المفتاح المضغوط هو Enter (رمزه 13)
			  if (event.key === 'Enter') {
				event.preventDefault();  // منع إرسال النموذج بشكل افتراضي
				
				// الحصول على القيمة المكتوبة في حقل الإدخال
				var searchValue = searchInput.value;
				
				// تنفيذ الكود الذي تريده عند ضغط Enter
				if (validator) {
					validator.validate().then(function (status) {
						if (status == 'Valid') {
								page=1;
								query=searchValue;
								$('#showMoreBtn').show(); 
							$('#services-body').html("");
							loadServices(searchValue);
						
					
						}else{
							Swal.fire({
								text: system_translation["Sorry, looks like there are some errors detected, please try again"],
								icon: "error",
								buttonsStyling: false,
								confirmButtonText: system_translation["Ok, got it!"],
								customClass: {
									confirmButton: "btn font-weight-bold btn-light"
								}
						
					});
				}
	
	
		
	
	
			})
	
		}
			  }
			});
			

		




	
	




