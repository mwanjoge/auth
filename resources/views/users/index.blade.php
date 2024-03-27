@extends('layouts.app')

@section('content')
    <div class="">

        <!-- Header -->
        @include("nisimpo::common.navbar")

        <!-- Navigation -->

        @include("nisimpo::common.sidebar")

        <!-- Main Wrapper -->
        <div id="wrapper">

            <div class="content">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="p-0 m-0">Users</h1>
                    </div>
                    <div class="col-sm-6">
                        <button class="btn btn-success" style="float: right;">Add</button>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="table-responsive  mt-3">
                        <table  class="table  table-striped">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Full Name</th>
                                <th>Gender</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>Purus Gravida Sagittis Limited</td>
                                <td>055 1753 4032</td>
                                <td>055 1753 4032</td>
                                <td>
                                    <div class="dropdown">
                                        <span class="glyphicon glyphicon-option-vertical" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" aria-hidden="true"></span>

                                        <ul class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenu1">
                                            <li class="dropdown-header">Actions</li>
                                            <li>
                                                <a href="{{ route("manage-users.show",[0]) }}">
                                                    <span class="glyphicon glyphicon-eye-open text-success" aria-hidden="true"></span> View
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <span class="glyphicon glyphicon-edit text-primary" aria-hidden="true"></span> Edit
                                                </a>
                                            </li>
                                            <li role="separator" class="divider"></li>
                                            <li>
                                                <a href="#">
                                                    <span class="glyphicon glyphicon-trash text-danger" aria-hidden="true"></span> Delete
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Posuere Enim Inc.</td>
                                <td>0313 143 2317</td>
                                <td>0313 143 2317</td>
                                <td>
                                    <div class="dropdown">
                                        <span class="glyphicon glyphicon-option-vertical" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" aria-hidden="true"></span>

                                        <ul class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenu1">
                                            <li class="dropdown-header">Actions</li>
                                            <li>
                                                <a href="{{ route("manage-users.show",[0]) }}">
                                                    <span class="glyphicon glyphicon-eye-open text-success" aria-hidden="true"></span> View
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <span class="glyphicon glyphicon-edit text-primary" aria-hidden="true"></span> Edit
                                                </a>
                                            </li>
                                            <li role="separator" class="divider"></li>
                                            <li>
                                                <a href="#">
                                                    <span class="glyphicon glyphicon-trash text-danger" aria-hidden="true"></span> Delete
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Quisque Imperdiet Company</td>
                                <td>076 1743 8649</td>
                                <td>076 1743 8649</td>
                                <td>
                                    <div class="dropdown">
                                        <span class="glyphicon glyphicon-option-vertical" id="dropdownMenu1 dropdown-menu-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" aria-hidden="true"></span>
                                        <ul class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenu1">
                                            <li class="dropdown-header">Actions</li>
                                            <li>
                                                <a href="{{ route("manage-users.show",[0]) }}">
                                                    <span class="glyphicon glyphicon-eye-open text-success" aria-hidden="true"></span> View
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <span class="glyphicon glyphicon-edit text-primary" aria-hidden="true"></span> Edit
                                                </a>
                                            </li>
                                            <li role="separator" class="divider"></li>
                                            <li>
                                                <a href="#">
                                                    <span class="glyphicon glyphicon-trash text-danger" aria-hidden="true"></span> Delete
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Quam Incorporated</td>
                                <td>0863 826 7513</td>
                                <td>0863 826 7513</td>
                                <td>
                                    <div class="dropdown">
                                        <span class="glyphicon glyphicon-option-vertical dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" aria-hidden="true"></span>

                                        <ul class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenu1">
                                            <li class="dropdown-header">Actions</li>
                                            <li>
                                                <a href="{{ route("manage-users.show",[0]) }}">
                                                    <span class="glyphicon glyphicon-eye-open text-success" aria-hidden="true"></span> View
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <span class="glyphicon glyphicon-edit text-primary" aria-hidden="true"></span> Edit
                                                </a>
                                            </li>
                                            <li role="separator" class="divider"></li>
                                            <li>
                                                <a href="#">
                                                    <span class="glyphicon glyphicon-trash text-danger" aria-hidden="true"></span> Delete
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Tempor Erat Corp.</td>
                                <td>0845 46 45</td>
                                <td>0845 46 45</td>
                                <td>
                                    <div class="dropdown">
                                        <span class="glyphicon glyphicon-option-vertical" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" aria-hidden="true"></span>

                                        <ul class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenu1">
                                            <li class="dropdown-header">Actions</li>
                                            <li>
                                                <a href="{{ route("manage-users.show",[0]) }}">
                                                    <span class="glyphicon glyphicon-eye-open text-success" aria-hidden="true"></span> View
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <span class="glyphicon glyphicon-edit text-primary" aria-hidden="true"></span> Edit
                                                </a>
                                            </li>
                                            <li role="separator" class="divider"></li>
                                            <li>
                                                <a href="#">
                                                    <span class="glyphicon glyphicon-trash text-danger" aria-hidden="true"></span> Delete
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                        <!--
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Full Name</th>
                                <th>Gender</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>Said Khamis</td>
                                <td>Male</td>
                                <td>=Active</td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
    -->
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection


