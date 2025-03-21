@php

        
        $destroyRoute=route("service.destroy",$row->id);
        $restoreRoute=route("service.restore",$row->id);
        $hideRoute=route("service.hide",$row->id);

@endphp




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
                                                @can("view services")
                                  <li class="navi-item">	      
  
                                      <a href="{{route('service.show',$row->id)}}" class="navi-link">	        
                                          <span class="navi-icon"><i class="
fas fa-lightbulb"></i></span>	         
                                                     <span class="navi-text">{{__('view')}}</span>	      
                                                               </a>	 
                                     
                                                               
                                                               
                                                              </li>	        
                                                              @endcan
                                                              @can("edit services")
                                  <li class="navi-item">	      
  
                                      <a href="{{route("service.edit",$row->id)}}" class="navi-link">	        
                                          <span class="navi-icon"><i class="far fa-edit"></i></span>	         
                                                     <span class="navi-text">{{__('edit')}}</span>	      
                                                               </a>	 
                                     
                                                               
                                                               
                                                              </li>	        
                                                              @endcan

                                                              @if ($row->deleted_at)
                                                              @can("restore services")
                                                              <li class="navi-item">	      
  
                                                                <a onclick='
                                                                event.preventDefault();
                                                                 _post("{{$restoreRoute}}","{{csrf_token()}}","show");  ' 
                                                               href="#"  class="navi-link">	        
                                                                    <span class="navi-icon"><i class="
far fa-eye"></i></span>	         
                                                                               <span class="navi-text">{{__('show')}}</span>	      
                                                                                         </a>	 
                                                               
                                                                                         
                                                                                         
                                                                                        </li>	 
                                                             @endcan
                                                              @else
                                                              @can("hide services")
                                                              <li class="navi-item">	      
  
                                                                <a onclick='
                                                                event.preventDefault();
                                                                 _post("{{$hideRoute}}","{{csrf_token()}}","hide");  '
                                                               href="#"  class="navi-link">	        
                                                                    <span class="navi-icon"><i class="
far fa-eye-slash"></i></span>	         
                                                                               <span class="navi-text">{{__('hide')}}</span>	      
                                                                                         </a>	 
                                                               
                                                                                         
                                                                                         
                                                                                        </li>	  
                                                             @endcan
                                                              @endif









                                                              @can("delete services")
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



