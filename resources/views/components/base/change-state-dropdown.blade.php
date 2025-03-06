                <!--end::Info-->
                <div class="dropdown">
                    <button type="button" class="btn btn-light-primary btn-icon btn-sm" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="ki ki-gear"></i>
                    </button>
                    <div class="dropdown-menu mr-15" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item font-weight-bold d-flex justify-content-between  "
                            onclick="changeState('{{ route($route, [$type => $id, 'state' => 'accepted']) }}','{{ csrf_token() }}')"
                            href="#"><span>{{ __('accept') }}</span> <i class="ki ki-bold-check text-success"></i></a>
                        <a class="dropdown-item font-weight-bold d-flex justify-content-between "
                            onclick="changeState('{{ route($route, [$type => $id, 'state' => 'rejected']) }}','{{ csrf_token() }}')"
                            href="#"><span>{{ __('reject') }}</span> <i class="ki ki-bold-close text-danger"></i></a>
                        <a class="dropdown-item font-weight-bold d-flex justify-content-between "
                            onclick="changeState('{{ route($route, [$type => $id, 'state' => 'pending']) }}','{{ csrf_token() }}')"
                            href="#"><span>{{ __('suspend') }}</span> <i class="ki ki-round text-warning"></i></a>
                    </div>
                </div>


                @push('scripts')
                <script src="{{asset('assets/js/crisis_management/actions/change-state-dropdown.js')}}"></script>
                @endpush