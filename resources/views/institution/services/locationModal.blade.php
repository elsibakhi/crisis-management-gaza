<!-- Modal-->
<div class="modal fade"  id="locationServiceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('the distance between you and the service')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>

          
                <div class="modal-body">

                    <div class="card card-custom">
          

                        <div class="card-body">
         
                            <div id="kt_leaflet_2" style="height:300px;"></div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold"
                        data-dismiss="modal">{{__('close')}}</button>
                 
                </div>


        
        </div>






    </div>
</div>


@push('scripts')
<script>
     window.service ={
        "title":"{{$service->title}}",
        "lat":"{{$service->location->lat}}",
        "lng":"{{$service->location->lng}}"
    };

    console.log(window.service)
</script>
<script src="{{asset('assets/plugins/custom/leaflet/leaflet.bundle.js')}}"></script>
<script src="{{ asset('assets/js/crisis_management/services/locationModal.js') }}"></script>
@endpush
