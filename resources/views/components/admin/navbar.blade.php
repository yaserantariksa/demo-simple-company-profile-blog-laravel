{{-- begin:Navbar --}}
<div class="app-header navbar navbar-expand bg-body">
    {{-- begin:Container --}}
    <div class="container-fluid">
        {{-- begin:Navbar Nav Left --}}
        <ul class="navbar-nav">
            {{-- begin:Sidebar Toggle --}}
            <li class="nav-item">
                <a href="#" class="nav-link" data-lte-toggle="sidebar" role="button">
                    <i class="bi bi-list-nested"></i>
                </a>
            </li>
            {{-- end:Sidebar Toggle --}}
        </ul>
        {{-- end:Navbar Nav Left --}}
        {{-- begin:Navbar Nav Right --}}
        <ul class="navbar-nav">
            <!--begin::User Menu Dropdown-->
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="bi bi-person-circle"></i>
                    {{-- <img src="../../dist/assets/img/user2-160x160.jpg" class="user-image rounded-circle shadow"
                        alt="User Image"> --}}
                    <span class="d-none d-md-inline">{{ auth()->user()->name }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <!--begin::User Image-->
                    <li class="user-header text-bg-primary">
                        <i class="bi bi-person-circle" style="font-size: 60px;"></i>
                        {{-- <img src="../../dist/assets/img/user2-160x160.jpg"
                            class="rounded-circle shadow" alt="User Image"> --}}
                        <p>
                            {{ auth()->user()->name }}
                        </p>
                    </li> <!--end::User Image-->
                    <!--begin::Menu Body-->
                    <li class="user-body">
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-4 text-center"> <a href="#">Followers</a> </div>
                            <div class="col-4 text-center"> <a href="#">Sales</a> </div>
                            <div class="col-4 text-center"> <a href="#">Friends</a> </div>
                        </div>
                        <!--end::Row-->
                    </li>
                    <!--end::Menu Body-->
                    <!--begin::Menu Footer-->
                    <li class="d-flex align-items-center justify-content-between p-3">
                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <input type="submit" value="Sign Out" class="btn btn-outline-danger">
                        </form>
                    </li>
                    <!--end::Menu Footer-->
                </ul>
            </li>
            <!--end::User Menu Dropdown-->
        </ul>
        {{-- end:Navbar nav Right --}}
    </div>
    {{-- end:Container --}}
</div>
{{-- end:Navbar --}}
