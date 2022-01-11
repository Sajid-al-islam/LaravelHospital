<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ auth()->user()->photo }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('user.profile', auth()->user()->id) }}" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>
        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->

            @if(auth()->user()->userHasRole('super-admin'))
                <!-- DOCTORS SECTION -->
                <li class="nav-item menu-open">
                    <a href="{{ route('admin.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Doctors Section
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('doctor.add') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Doctor</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('doctor.view') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Doctor</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
            
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Department Section
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('department.add') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Department</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('department.view') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Departments</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Service Section
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('service.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Services</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('service.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Service List</p>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
                <!-- PATIENTS SECTION -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Patients Section
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('patient.add') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Patients</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('patient.view') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Patients</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Appointment Section
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('appointment.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Appointment</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.list') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Appointment List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Prescription Section
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('doctor.prescription') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Prescription</p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="{{ route('view.prescription.list') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Prescription list</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- PROFILE SECTION -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            PROFILE
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('user.profile', auth()->user()->id) }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>PROFILE</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="fas fa-circle nav-icon"></i>
                                    <p>{{ __('Logout') }}</p>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                </form>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>