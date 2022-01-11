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