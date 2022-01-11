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

            @if(auth()->user()->userHasRole('super-admin'))

                <li class="nav-item menu-open">
                    <a href="{{ route('admin.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <x-admin.sidebar_link.admin-sidebar-department-link></x-admin.sidebar_link.admin-sidebar-department-link>
                
                <x-admin.sidebar_link.admin-sidebar-doctor-link></x-admin.sidebar_link.admin-sidebar-doctor-link>
                
                <x-admin.sidebar_link.admin-sidebar-service-link></x-admin.sidebar_link.admin-sidebar-service-link>
                
                <x-admin.sidebar_link.admin-sidebar-attendance-schedule-link></x-admin.sidebar_link.admin-sidebar-attendance-schedule-link>

            @endif

            @if(auth()->user()->userHasRole('super-admin') || auth()->user()->userHasRole('doctor'))

                <!-- <x-admin.sidebar_link.admin-sidebar-patient-link></x-admin.sidebar_link.admin-sidebar-patient-link> -->
            @endif

            @if(auth()->user()->userHasRole('doctor'))
                <x-admin.sidebar_link.admin-sidebar-doctor-bed-patient-link></x-admin.sidebar_link.admin-sidebar-doctor-bed-patient-link>
                
                <x-admin.sidebar_link.admin-sidebar-appointment-link></x-admin.sidebar_link.admin-sidebar-appointment-link>

                <x-admin.sidebar_link.admin-sidebar-prescription-link></x-admin.sidebar_link.admin-sidebar-prescription-link>

                <x-admin.sidebar_link.admin-sidebar-schedule-link></x-admin.sidebar_link.admin-sidebar-schedule-link>

            @endif

                <x-admin.sidebar_link.admin-sidebar-inpatient-link></x-admin.sidebar_link.admin-sidebar-inpatient-link>

                <x-admin.sidebar_link.admin-sidebar-bed-link></x-admin.sidebar_link.admin-sidebar-bed-link>

                <x-admin.sidebar_link.admin-sidebar-profile-link></x-admin.sidebar_link.admin-sidebar-profile-link>

                <!-- <li class="nav-item menu-open">
                    <a href="{{ route('admin.message.doctor') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Message Doctor
                        </p>
                    </a>
                </li> -->

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Finance Section
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('finance.add') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Finance Add</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('finance') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Finance List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
            </ul>
        </nav>

    </div>

</aside>