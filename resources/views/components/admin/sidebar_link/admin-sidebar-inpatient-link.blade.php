<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-book"></i>
        <p>
            InPatient Section
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('inpatient.add') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Patient</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('inpatient.view') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View Patient</p>
            </a>
        </li>
    </ul>
</li>