@extends('nisimpo::layouts.app')

@section('content')
    <div class="">

        <!-- Header -->
        @include("nisimpo::common.navbar")

        <!-- Navigation -->

        @include("nisimpo::common.sidebar")

        <!-- Main Wrapper -->
        <div id="wrapper">

            <div class="content col">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="p-0 m-0">Roles</h1>
                    </div>
                    <div class="col-sm-6">
                        <button class="btn btn-success" style="float: right;">Add</button>
                    </div>
                </div>
                <div class="table-responsive w-100">
                    <table class="table table-striped" id="tableRoles">
                        <thead>
                           <tr>
                               <th>S/N</th>
                               <th>Name</th>
                               <th>Guard</th>
                               <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>

                         {{--@if(count($roles) > 0)
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->guard_name }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <span class="glyphicon glyphicon-option-vertical" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" aria-hidden="true"></span>
                                            <ul class="dropdown-menu " aria-labelledby="dropdownMenu1">
                                                <li class="dropdown-header">Actions</li>
                                                <li>
                                                    <a href="">
                                                        <span class="glyphicon glyphicon-eye-open text-success" aria-hidden="true"></span> View
                                                    </a>
                                                </li>
                                                <li><a href="#">Edit</a></li>
                                                <li role="separator" class="divider"></li>
                                                <li><a href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif--}}

                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
@endsection

@section("scripts")
    <script type="text/javascript">
        $(function (){

            const tableUsers = $('#tableRoles').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("roles.index") }}',
                    type: 'GET'
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'guard_name', name: 'guard_name'},
                    {data: 'action', name: 'action'},
                    /*   {
                           data: 'action',
                           name: 'action',
                           orderable: false,
                           searchable: false,
                           render: function(data, type, row) {
                               return data;
                           }
                       },*/
                ],
            });
        })
    </script>
@endsection



