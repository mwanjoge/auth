@extends('nisimpo::layouts.app')

@section('content')
    <div class="">

        <!-- Header -->
        @include("nisimpo::common.navbar")

        <!-- Navigation -->

        @include("nisimpo::common.sidebar")

        <!-- Main Wrapper -->
        <div id="wrapper">

            <div class="content">
                <div class="container">
                   <div class="row">
                       <div class="col-sm-3">
                           <div class="col">
                              <div class="hpanel">
                                  <div class="panel-body">
                                      <div style="display: flex; flex-direction: column; align-items: center;">
                                          <img src="{{ asset("images/profile.jpg") }}" class="img-circle" alt="logo">
                                          <h3 class="p-0 m-0">{{ $user->full_name }}</h3>
                                          <h4 class="p-0 m-0 text-success">{{ $user->is_active ? "ACTIVE" : "INACTIVE" }} </h4>
                                          <div class="row mt-3">
                                              <a class="btn btn-primary" href="{{ $user->id }}">Edit</a>
                                              <a class="btn btn-danger" href="{{ $user->id }}">Delete</a>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                           </div>
                       </div>
                       <div class="col-sm-9">
                           <div class="hpanel">
                               <div class="panel-body">
                                   <div class="panel-title">ASSIGN ROLE</div>
                                   <div class="row" style="margin-top: 15px;">
                                       @if(count($roles) > 0)
                                           @foreach($roles as $role)
                                               <div class="col-sm-4">
                                                   <div class="a_permission">
                                                       <input type="checkbox"  class="form-check m-r-n-sm"/>
                                                       <div class="nav-divider"></div>
                                                       <span>{{ $role->name }}</span>
                                                   </div>
                                               </div>
                                           @endforeach
                                       @endif
                                   </div>

                               </div>
                           </div>
                           <div class="hpanel">
                              <div class="panel-body">
                                  <div class="panel-title">ASSIGN PERMISSIONS</div>
                                  <div class="row" style="margin-top: 15px;">
                                      <div class="col-sm-4">
                                          <div class="col">
                                              <div class="permission_title margin-bottom">
                                                  <input type="checkbox" class="form-check m-r-n-sm"/>
                                                  <span>Sidebar</span>
                                              </div>
                                              <hr/>
                                              <div class="a_permission">
                                                  <input type="checkbox" class="form-check m-r-n-sm"/>
                                                  <div class="nav-divider"></div>
                                                  <span>view dashboard</span>
                                              </div>
                                              <div class="a_permission">
                                                  <input type="checkbox" class="form-check m-r-n-sm"/>
                                                  <div class="nav-divider"></div>
                                                  <span>view user management</span>
                                              </div>
                                              <div class="a_permission">
                                                  <input type="checkbox" class="form-check m-r-n-sm"/>
                                                  <div class="nav-divider"></div>
                                                  <span>view procurement</span>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-sm-4">
                                          <div class="col">
                                              <div class="permission_title margin-bottom">
                                                  <input type="checkbox" class="form-check m-r-n-sm"/>
                                                  <span>Roles</span>
                                              </div>
                                              <hr/>
                                              <div class="a_permission">
                                                  <input type="checkbox" class="form-check m-r-n-sm"/>
                                                  <div class="nav-divider"></div>
                                                  <span>view dashboard</span>
                                              </div>
                                              <div class="a_permission">
                                                  <input type="checkbox" class="form-check m-r-n-sm"/>
                                                  <div class="nav-divider"></div>
                                                  <span>view dashboard</span>
                                              </div>
                                              <div class="a_permission">
                                                  <input type="checkbox" class="form-check m-r-n-sm"/>
                                                  <div class="nav-divider"></div>
                                                  <span>view dashboard</span>
                                              </div>
                                              <div class="a_permission">
                                                  <input type="checkbox" class="form-check m-r-n-sm"/>
                                                  <div class="nav-divider"></div>
                                                  <span>view dashboard</span>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-sm-4">
                                          <div class="col">
                                              <div class="permission_title margin-bottom">
                                                  <input type="checkbox" class="form-check m-r-n-sm"/>
                                                  <span>Permissions</span>
                                              </div>
                                              <hr/>

                                              <div class="a_permission">
                                                  <input type="checkbox" class="form-check m-r-n-sm"/>
                                                  <div class="nav-divider"></div>
                                                  <span>view permission</span>
                                              </div>
                                              <div class="a_permission">
                                                  <input type="checkbox" class="form-check m-r-n-sm"/>
                                                  <div class="nav-divider"></div>
                                                  <span>create permission</span>
                                              </div>
                                              <div class="a_permission">
                                                  <input type="checkbox" class="form-check m-r-n-sm"/>
                                                  <div class="nav-divider"></div>
                                                  <span>view dashboard</span>
                                              </div>
                                              <div class="a_permission">
                                                  <input type="checkbox" class="form-check m-r-n-sm"/>
                                                  <div class="nav-divider"></div>
                                                  <span>view dashboard</span>
                                              </div>
                                          </div>
                                      </div>
                                  </div>

                                 <hr/>
                                  <div class="row">
                                      <div class="col-sm-4">
                                          <div class="col">
                                              <div class="permission_title margin-bottom">
                                                  <input type="checkbox" class="form-check m-r-n-sm"/>
                                                  <span>Sidebar</span>
                                              </div>
                                              <hr/>
                                              <div class="a_permission">
                                                  <input type="checkbox" class="form-check m-r-n-sm"/>
                                                  <div class="nav-divider"></div>
                                                  <span>view dashboard</span>
                                              </div>
                                              <div class="a_permission">
                                                  <input type="checkbox" class="form-check m-r-n-sm"/>
                                                  <div class="nav-divider"></div>
                                                  <span>view user management</span>
                                              </div>
                                              <div class="a_permission">
                                                  <input type="checkbox" class="form-check m-r-n-sm"/>
                                                  <div class="nav-divider"></div>
                                                  <span>view procurement</span>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-sm-4">
                                          <div class="col">
                                              <div class="permission_title margin-bottom">
                                                  <input type="checkbox" class="form-check m-r-n-sm"/>
                                                  <span>Roles</span>
                                              </div>
                                              <hr/>
                                              <div class="a_permission">
                                                  <input type="checkbox" class="form-check m-r-n-sm"/>
                                                  <div class="nav-divider"></div>
                                                  <span>view dashboard</span>
                                              </div>
                                              <div class="a_permission">
                                                  <input type="checkbox" class="form-check m-r-n-sm"/>
                                                  <div class="nav-divider"></div>
                                                  <span>view dashboard</span>
                                              </div>
                                              <div class="a_permission">
                                                  <input type="checkbox" class="form-check m-r-n-sm"/>
                                                  <div class="nav-divider"></div>
                                                  <span>view dashboard</span>
                                              </div>
                                              <div class="a_permission">
                                                  <input type="checkbox" class="form-check m-r-n-sm"/>
                                                  <div class="nav-divider"></div>
                                                  <span>view dashboard</span>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-sm-4">
                                          <div class="col">
                                              <div class="permission_title margin-bottom">
                                                  <input type="checkbox" class="form-check m-r-n-sm"/>
                                                  <span>Permissions</span>
                                              </div>
                                              <hr/>

                                              <div class="a_permission">
                                                  <input type="checkbox" class="form-check m-r-n-sm"/>
                                                  <div class="nav-divider"></div>
                                                  <span>view permission</span>
                                              </div>
                                              <div class="a_permission">
                                                  <input type="checkbox" class="form-check m-r-n-sm"/>
                                                  <div class="nav-divider"></div>
                                                  <span>create permission</span>
                                              </div>
                                              <div class="a_permission">
                                                  <input type="checkbox" class="form-check m-r-n-sm"/>
                                                  <div class="nav-divider"></div>
                                                  <span>view dashboard</span>
                                              </div>
                                              <div class="a_permission">
                                                  <input type="checkbox" class="form-check m-r-n-sm"/>
                                                  <div class="nav-divider"></div>
                                                  <span>view dashboard</span>
                                              </div>
                                          </div>
                                      </div>
                                  </div>

                              </div>
                          </div>
                       </div>
                   </div>
                </div>
            </div>

        </div>

    </div>
@endsection


