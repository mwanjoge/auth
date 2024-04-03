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
                        <div class="col-sm-12">
                            <div class="col">
                                <div class="hpanel">
                                    <div class="panel-body">
                                        <div style="display: flex; flex-direction: column; align-items: center;">
                                            <h3 class="p-0 m-0">{{ $role->name }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="hpanel">
                                <div class="panel-body">
                                    <div class="panel-title">ASSIGN PERMISSIONS</div>

                                    <div class="row" style="margin-top: 15px;">
                                        @if( $modules_permissions != null)
                                            @if(count($modules_permissions) > 0)
                                                @foreach($modules_permissions as $permission)
                                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                                                        <div class="permission_title margin-bottom">
                                                            <input type="checkbox" class="form-check m-r-n-sm"/>
                                                            <span>{{ $permission->name }}</span>
                                                        </div>
                                                        @if(count($permission->permissions) > 0)
                                                            @foreach($permission->permissions as $perm)
                                                                <div class="a_permission">
                                                                    <input type="checkbox" class="form-check m-r-n-sm" {{ $role->hasPermissionTo($perm->name) ? 'checked' : '' }}/>
                                                                    <div class="nav-divider"></div>
                                                                    <span>{{ $perm->name }}</span>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                        <hr/>
                                                    </div>
                                                @endforeach
                                            @endif
                                        @endif
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


