@php

        
        $destroyRoute=route("admin.opinion.destroy",$row->id);

@endphp

<div   >

 





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
                 
                                                                @can('change opinions status')
                                                                @if ($row->status=="pending")
                                                                <li class="navi-item">	      
        
                                                                    <a href="#" class="navi-link" onclick="changeState('{{ route('admin.opinion.changeState', ['opinion' => $row->id, 'state' => 'accepted']) }}','{{ csrf_token() }}')">	        
                                                                        <span class="navi-icon"><i class="fas fa-check"></i></span>	         
                                                                                   <span class="navi-text">{{ __('accept') }}</span>	      
                                                                                             </a>	 
                                                                   
                                                                                     
                                                                                             
                                                                                            </li>	 
                                                               
                                                                @elseif ($row->status=="accepted")
                                                                <li class="navi-item">	      
                                
                                                                    <a href="#" class="navi-link" onclick="changeState('{{ route('admin.opinion.changeState', ['opinion' => $row->id, 'state' => 'pending']) }}','{{ csrf_token() }}')">	        
                                                                        <span class="navi-icon"><i class="fas fa-clock"></i></span>	         
                                                                                   <span class="navi-text">{{ __('suspend') }}</span>	      
                                                                                             </a>	 
                                                                   
                                                                                     
                                                                                             
                                                                                            </li>
                                                                @endif
                                                                  
                                                           	          
                                                                @endcan


                                                                        
                                                                @can('delete opinions')
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
