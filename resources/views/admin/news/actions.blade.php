@php

        
        $destroyRoute=route("news.destroy",$row->id);

@endphp

<div class="d-flex justify-content-between w-50" >


	
    <a  class="btn btn-sm btn-clean btn-icon mr-2"  onclick='
    event.preventDefault();

      Swal.fire({
										text: "{{$row->news}}",
								
								
									})
                  
                  '>	  
                                              <span class="svg-icon svg-icon-md">	  
<!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Design/ZoomPlus.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
 
  <defs/>
  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
      <rect x="0" y="0" width="24" height="24"/>
      <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
      <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"/>
      <path d="M10.5,10.5 L10.5,9.5 C10.5,9.22385763 10.7238576,9 11,9 C11.2761424,9 11.5,9.22385763 11.5,9.5 L11.5,10.5 L12.5,10.5 C12.7761424,10.5 13,10.7238576 13,11 C13,11.2761424 12.7761424,11.5 12.5,11.5 L11.5,11.5 L11.5,12.5 C11.5,12.7761424 11.2761424,13 11,13 C10.7238576,13 10.5,12.7761424 10.5,12.5 L10.5,11.5 L9.5,11.5 C9.22385763,11.5 9,11.2761424 9,11 C9,10.7238576 9.22385763,10.5 9.5,10.5 L10.5,10.5 Z" fill="#000000" opacity="0.3"/>
  </g>
</svg><!--end::Svg Icon-->	               
                                     </span>	                            </a>				
                                       






 






            <div class="dropdown dropdown-inline" >				
              <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2" data-toggle="dropdown">	  
                                                        <span class="svg-icon svg-icon-md">	  
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">	  
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">	                     
              <rect x="0" y="0" width="24" height="24"></rect>	            
            <path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"></path>	            
                                  </g>	                                    </svg>	               
                                               </span>	                            </a>				
                                                         <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">	         
                                                                                         <ul class="navi flex-column navi-hover py-2">	 
                              <li class="navi-header font-weight-bolder text-uppercase font-size-xs text-primary pb-2">	            
                                      {{__('Choose an action:')}}	          
                                                            </li>	              
                                                            @can('edit news')
                                              <li class="navi-item">	      
              
                                                  <a href="{{route("news.edit",$row->id)}}" class="navi-link">	        
                                                      <span class="navi-icon"><i class="far fa-edit"></i></span>	         
                                                                 <span class="navi-text">{{__('edit')}}</span>	      
                                                                           </a>	 
                                                 
                                                                           
                                                                           
                                                                          </li>	        
                                                                          @endcan
                                                                          @can('delete news')
                                              <li class="navi-item">	      
              
                                                  <a href="#" class="navi-link" onclick='
                                                  event.preventDefault();
                                                   _delete("{{$destroyRoute}}","{{csrf_token()}}");  '>	        
                                                      <span class="navi-icon"><i class="far fa-trash-alt"></i></span>	         
                                                                 <span class="navi-text">{{__('delete')}}</span>	      
                                                                           </a>	 
                                                 
                                                                           
                                                                           
                                                                          </li>	        
                                                                          @endcan
                                                              </ul>					
                                                               </div>		
                                                            </div>
            
            
            
            





</div>