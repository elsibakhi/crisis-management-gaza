<div class="modal fade" id="news" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="vaildate"></div>
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('add news') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">


                <div class="card card-custom">

                    <!--begin::Form-->
                    <form id="news_form" class="form" action="{{ route('news.store') }}" method="POST"> 
                        @csrf
                        <div class="card-body">

                            <div class="form-group fv-plugins-icon-container">
                                <label>{{ __('title') }}</label>
                                <input type="text" name="title" class="form-control form-control-solid form-control-lg"
                               />
                                
                            <div class="fv-plugins-message-container"></div></div>
                            <div class="form-group fv-plugins-icon-container">
                                <label>{{ __('the news') }}</label>
                                <textarea  rows="10" name="news" class="form-control form-control-solid form-control-lg"
                           ></textarea>
                                
                            <div class="fv-plugins-message-container"></div></div>

                        

                     
                           
                        </div>
                        <div class="modal-footer">
                            <button id="modal_close" type="button" class="btn btn-light-primary font-weight-bold"
                                data-dismiss="modal">{{ __('close') }}</button>
                            <button id="modal_submit" type="submit"
                                class="btn btn-primary font-weight-bold">{{ __('add') }}</button>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>








            </div>
        </div>
    </div>
