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