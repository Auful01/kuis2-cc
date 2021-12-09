<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="{{url('profile', Auth::user()->id )}}" class="d-block">{{Auth::user()->name}}</a>
        </div>
    </div>

    <!-- SidebarSearch Form -->


    <!-- Sidebar Menu -->
    <nav class="mt-2">

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            @if (Auth::user()->role == 0)
            <li class="nav-item">
                <a href="{{route('user-home')}}" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Home

                    </p>
                </a>
            </li>
            <!-- Add icons to the links using the .nav-icon class
   with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-medkit"></i>
                    <p>
                        Treatments
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('treatment-user.show', 1)}}" class="nav-link {{Request::segment(2) == 1 ? 'active' : ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Acne</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('treatment-user/2')}}" class="nav-link {{Request::segment(2) == 2? 'active' : ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Body Treatment</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('treatment-user/3')}}" class="nav-link {{Request::segment(2) == 3 ? 'active' : ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Pigmentation</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('treatment-user/4')}}" class="nav-link {{Request::segment(2) == 4 ? 'active' : ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Rejuvenating</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('treatment-user/5')}}" class="nav-link {{Request::segment(2) == 5 ? 'active' : ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Scar</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('treatment-user/6')}}" class="nav-link {{Request::segment(2) == 6 ? 'active' : ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>White & Glow</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{route('doctor')}}" class="nav-link">
                    <i class="nav-icon fas fa-user-md"></i>
                    <p>
                        Doctor

                    </p>
                </a>
            </li>
            <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                    <i class="fas fa-money-bill-wave"></i>
                    <p>
                        Transaction
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('reservasi-user', Auth::user()->id)}}" class="nav-link {{Request::segment(2) == 1 ? 'active' : ''}}">
                            <i class="nav-icon fas fa-clipboard-list"></i>
                            <p>Reservasi</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('consult-user', Auth::user()->id)}}" class="nav-link {{Request::segment(2) == 2? 'active' : ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Consultation</p>
                        </a>
                    </li>

                </ul>
            </li>
            {{-- <li class="nav-item">
                <a href="pages/widgets.html" class="nav-link">
                    <i class="nav-icon fas fa-clipboard-list"></i>
                    <p>
                        Reservation

                    </p>
                </a>
            </li> --}}
            {{-- <li class="nav-item">
                <a href="pages/widgets.html" class="nav-link">
                    <i class="nav-icon fas fa-power-off"></i>
                    <p>
                        Logout

                    </p>
                </a>
            </li> --}}
            @elseif (Auth::user()->role ==1)
            <li class="nav-item">
                <a href="/dashboard" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Dashboard

                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('customer.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        User

                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('treatment.index')}}" class="nav-link {{Request::segment(1) == 'treatment' ? 'active' : ''}}">
                    <i class="nav-icon fas fa-medkit"></i>
                    <p>
                        Layanan Treatment

                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('doctor-list.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-user-md"></i>
                    <p>
                        Konsultasi Dokter

                    </p>
                </a>
            </li>
            <li class="nav-item menu-open">
                <a href="#" class="nav-link {{Request::segment(1) == 'doctor-consul' ? 'active' : ''}}">
                    <i class="fas fa-money-bill-wave"></i>
                    <p>
                        Transaction
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('reservasi-ad')}}" class="nav-link {{Request::segment(2) == 1 ? 'active' : ''}}">
                            <i class="nav-icon fas fa-clipboard-list"></i>
                            <p>Reservasi</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('consul-admin')}}" class="nav-link {{Request::segment(2) == 2? 'active' : ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Consultation</p>
                        </a>
                    </li>

                </ul>
            </li>

            @endif
            <li class="nav-item">
                <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>
                        Logout

                    </p>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>


        </ul>


    </nav>
    <!-- /.sidebar-menu -->
</div>
