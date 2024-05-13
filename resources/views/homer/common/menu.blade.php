<li class="active">
    <a href="{{ route("home") }}"> <span class="nav-label">Dashboard</span> <span class="label label-success pull-right">v.1</span> </a>
</li>

<li>
    <a href="#"><span class="nav-label">User Management</span><span class="fa arrow"></span> </a>
    <ul class="nav nav-second-level">
        <li><a href="{{ route("users.index") }}">Users</a></li>
    </ul>
</li>

<li>
    <a href="#"><span class="nav-label">Roles & Permission</span><span class="fa arrow"></span> </a>
    <ul class="nav nav-second-level">
        <li><a href="{{ route("groups.index") }}">Groups</a></li>
        <li><a href="{{ route("roles.index") }}">Roles</a></li>
        <li><a href="{{ route("permissions.index") }}">Permissions</a></li>
    </ul>
</li>
