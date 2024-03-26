<!-- Navigation -->
<aside id="menu">
    <div id="navigation">
        <div class="profile-picture">
            <a href="index.html">
                <img src="{{ asset("images/profile.jpg") }}" class="img-circle m-b" alt="logo">
            </a>

            <div class="stats-label text-color">
                <span class="font-extra-bold font-uppercase">Robert Razer</span>

                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                        <small class="text-muted">Founder of App <b class="caret"></b></small>
                    </a>
                    <ul class="dropdown-menu animated flipInX m-t-xs">
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="profile.html">Profile</a></li>
                        <li><a href="analytics.html">Analytics</a></li>
                        <li class="divider"></li>
                        <li><a href="login.html">Logout</a></li>
                    </ul>
                </div>


                <div id="sparkline1" class="small-chart m-t-sm"></div>
                <div>
                    <h4 class="font-extra-bold m-b-xs">
                        $260 104,200
                    </h4>
                    <small class="text-muted">Your income from the last year in sales product X.</small>
                </div>
            </div>
        </div>

        <ul class="nav" id="side-menu">
            <li class="active">
                <a href="{{ route("home") }}"> <span class="nav-label">Dashboard</span> <span class="label label-success pull-right">v.1</span> </a>
            </li>

            <li>
                <a href="#"><span class="nav-label">User Management</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ route("manage-users.index") }}">Users</a></li>
                    <li><a href="{{ route("manage-roles.index") }}">Roles</a></li>
                    <li><a href="{{ route("manage-permissions.index") }}">Permissions</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><span class="nav-label">Procurement</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ route("manage-users.index") }}">Warehouse</a></li>
                    <li><a href="{{ route("manage-roles.index") }}">Requisition</a></li>
                    <li><a href="{{ route("manage-permissions.index") }}">Purchase Order</a></li>
                    <li><a href="{{ route("manage-permissions.index") }}">Stock Entry</a></li>
                    <li><a href="{{ route("manage-permissions.index") }}">Loading Order</a></li>
                </ul>
            </li>


        </ul>
    </div>
</aside>