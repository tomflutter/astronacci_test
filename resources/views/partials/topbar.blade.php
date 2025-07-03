<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <!-- Sidebar Toggle -->
    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- User Info -->
        @if(Auth::check())
<li class="nav-item dropdown no-arrow position-relative">
    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <!-- Foto Profil -->
        <div class="position-relative">
            <img class="img-profile rounded-circle"
                src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}"
                style="width: 40px; height: 40px;">
            <!-- Badge Membership -->
            @php
                $badgeColor = match (Auth::user()->membership_type) {
                    'A' => 'bg-danger',
                    'B' => 'bg-primary',
                    'C' => 'bg-success',
                    default => 'bg-secondary',
                };
            @endphp
            <span class="position-absolute {{ $badgeColor }} text-white rounded-circle"
                style="top: -4px; right: -4px; width: 20px; height: 20px; font-size: 12px;
                       display: flex; align-items: center; justify-content: center;
                       pointer-events: none; border: 2px solid white;">
                {{ Auth::user()->membership_type }}
            </span>
        </div>
        <!-- Nama User -->
        <span class="ml-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
    </a>

    <!-- Dropdown Menu -->
    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="userDropdown">
        <a class="dropdown-item" href="{{ route('profile.edit') }}">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            Profil
        </a>
        <div class="dropdown-divider"></div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="dropdown-item" type="submit">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Keluar
            </button>
        </form>
    </div>
</li>
@endif


    </ul>
</nav>
