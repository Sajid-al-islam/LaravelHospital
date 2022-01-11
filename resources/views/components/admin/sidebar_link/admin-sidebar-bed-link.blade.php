<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-book"></i>
        <p>
            Bed Section
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.floor') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Floor</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.bed.category') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Bed Category</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.bed.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Bed</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('icu.ccu.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>ICU CCU Request</p>
            </a>
        </li>
    </ul>
</li>