@extends('layouts.guest.master')

@section('title')
{{ __('links') }}
@endsection

@section('content')


        <div class="card card-custom mb-10 col-12" id="kt_card_3">
              <!-- Placeholder for the Minibar -->
            <div class="card-header  ">
                <div class="card-title w-100 row justify-content-between  ">
                    <h2 class=""> {{__('links')}} </h2>

                    <form id="service_search"   method="get" class="form fv-plugins-bootstrap fv-plugins-framework w-50  "  >
               
                                    
            <div class="form-group mt-5 fv-plugins-icon-container">
          
              <div class="col-12">
                  <div class="input-group">
                      <div class="input-group-prepend">
                          <span class="input-group-text">
                              <i class="flaticon2-search"></i>
                          </span>
                      </div>
                      <input id="search_input" type="search" class="form-control" name="query">
                  </div>
              
              <div class="fv-plugins-message-container"></div></div>
          </div>
                                      
                                     
                         
                       
                      </form>
                      <!--end::Form-->
                </div>
                       
            </div>

            <div id="services-body" class="card-body m-4 bg-gray-100">
                <!-- سيتم تحميل الخدمات هنا -->
            </div>

         
                
                         
                      <div class="card-footer text-center">
                           <button id="showMoreBtn" class="btn btn-primary">{{__('show more')}}</button>
                     </div>
                      
        
         
        </div>





@endsection

@push('scripts')

    <script>
        const load_services_route = "{{ route('dummyUser.link.load') }}";
        var page = 1; // رقم الصفحة
        var query=false;
       </script>


     <script>
    

        // عندما يتم تحميل الصفحة لأول مرة
        $(document).ready(function() {
            
            loadServices();
        });

        // عند الضغط على زر "Show More"
        $('#showMoreBtn').click(function() {
            page++;  // زيادة رقم الصفحة
            loadServices();
        });
         </script> 
  


 <script>
  
        // دالة لتحميل الخدمات
        function loadServices(search=false) {
          
			// Your code here
			KTApp.block("#services-body", {
				overlayColor: '#000000',
				state: 'primary',
				message: '{{__("loading...")}}'
			});
            if(search){
                $.ajax({
                url: load_services_route + '?search='+search+'&page=' + page,
                type: 'GET',
                success: function(response) {
                    KTApp.unblock("#services-body");
                    $('#services-body').append(response);
                    
                    if (response.trim() == '') {
                        $('#showMoreBtn').hide(); // إخفاء زر "Show More" إذا لم يكن هناك خدمات جديدة
                    }
                }
            });
            }else{
                if(query){
                    $.ajax({
                url: load_services_route + '?search='+query+'&page=' + page,
                type: 'GET',
                success: function(response) {
                    KTApp.unblock("#services-body");
                    $('#services-body').append(response);
                    
                    if (response.trim() == '') {
                        $('#showMoreBtn').hide(); // إخفاء زر "Show More" إذا لم يكن هناك خدمات جديدة
                    }
                }
            });
                }else{

                    $.ajax({
                url: load_services_route +'?page=' + page,
                type: 'GET',
                success: function(response) {
                    KTApp.unblock("#services-body");
                    $('#services-body').append(response);
                    
                    if (response.trim() == '') {
                        $('#showMoreBtn').hide(); // إخفاء زر "Show More" إذا لم يكن هناك خدمات جديدة
                    }
                }
            });
                }
            
            }
       
        }
    </script>




<script src="{{ asset('assets/js/crisis_management/dummyUser/services/index.js') }}"></script>


<script src="{{ asset('assets/js/crisis_management/actions/copy-link.js') }}"></script>
@endpush
