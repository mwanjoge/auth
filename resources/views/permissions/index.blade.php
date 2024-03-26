@extends('layouts.app-master')

@section('content')
    <div class="">

        <!-- Header -->
        @include("common.navbar")

        <!-- Navigation -->

        @include("common.sidebar")

        <!-- Main Wrapper -->
        <div id="wrapper">

            <div class="content col">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="p-0 m-0">Permissions</h1>
                    </div>
                    <div class="col-sm-6">
                        <button class="btn btn-success" style="float: right;">Add</button>
                    </div>
                </div>
                <div class="table-responsive w-100">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Guard</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>view dashboard</td>
                            <td>web</td>
                            <td>
                                <div class="dropdown">
                                    <span class="glyphicon glyphicon-option-vertical" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" aria-hidden="true"></span>
                                    <ul class="dropdown-menu " aria-labelledby="dropdownMenu1">
                                        <li class="dropdown-header">Actions</li>
                                        <li>
                                            <a href="#">
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
                            <td>view user management</td>
                            <td>web</td>
                            <td>
                                <div class="dropdown">
                                    <span class="glyphicon glyphicon-option-vertical" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" aria-hidden="true"></span>

                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                        <li class="dropdown-header">Actions</li>
                                        <li><a href="#">View</a></li>
                                        <li><a href="#">Edit</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#">Delete</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>view roles</td>
                            <td>web</td>
                            <td>
                                <div class="dropdown">
                                    <span class="glyphicon glyphicon-option-vertical" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" aria-hidden="true"></span>

                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                        <li class="dropdown-header">Actions</li>
                                        <li><a href="#">View</a></li>
                                        <li><a href="#">Edit</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#">Delete</a></li>
                                    </ul>
                                </div>

                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>View Permissions</td>
                            <td>web</td>
                            <td>
                                <div class="dropdown">
                                    <span class="glyphicon glyphicon-option-vertical" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" aria-hidden="true"></span>

                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                        <li class="dropdown-header">Actions</li>
                                        <li><a href="#">View</a></li>
                                        <li><a href="#">Edit</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#">Delete</a></li>
                                    </ul>
                                </div>

                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>view procurement</td>
                            <td>web</td>
                            <td>
                                <div class="dropdown">
                                    <span class="glyphicon glyphicon-option-vertical" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" aria-hidden="true"></span>

                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                        <li class="dropdown-header">Actions</li>
                                        <li><a href="#">View</a></li>
                                        <li><a href="#">Edit</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#">Delete</a></li>
                                    </ul>
                                </div>

                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
@endsection


