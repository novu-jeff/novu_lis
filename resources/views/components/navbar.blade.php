<nav class="navbar navbar-expand-md navbar-dark bg-primary sticky-top shadow-sm py-2">
    <div class="container d-flex align-items-center justify-content-between">

        <!-- Brand / System Name -->
        <a class="navbar-brand fw-bold text-white" href="{{ route('home.index') }}">
            Legislative Information System
        </a>

        <!-- Desktop Right Menu -->
        <div class="d-none d-lg-flex align-items-center gap-3">
            @auth('member')
                <div class="dropdown">
                    <a class="nav-link text-white dropdown-toggle fw-semibold" href="#" data-bs-toggle="dropdown">
                        {{ auth('member')->user()->member->name }}
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end shadow">
                        <li>
                            <a class="dropdown-item" href="{{ route('members.dashboard') }}">
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('members.account') }}">
                                Update Account
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('members.logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <!-- Highlighted Login Button -->
                <a href="{{ route('members.login') }}" 
                   class="btn btn-light text-primary fw-semibold px-4 rounded-pill shadow-sm">
                    SB Member Login
                </a>
            @endauth
        </div>

        <!-- Mobile Hamburger -->
        <div class="hamburger d-lg-none">
            <input class="checkbox" type="checkbox" id="toggleSidebar" />
            <div class="hamburger-lines">
                <span class="line line1 bg-light"></span>
                <span class="line line2 bg-light"></span>
                <span class="line line3 bg-light"></span>
            </div>
        </div>

    </div>
</nav>