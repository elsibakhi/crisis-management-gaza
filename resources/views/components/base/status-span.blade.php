<span id="status_span"
                                    class="label 
                                @switch($status)
                                @case('accepted')
                                label-light-success
                                    @break
                                @case('rejected')
                                label-light-danger
                                    @break
                                @case('pending')
                                label-light-warning
                                    @break
                              
                                    
                            @endswitch
                               
                                
                                label-inline font-weight-bolder mr-1">{{ __($status) }}</span>


                  