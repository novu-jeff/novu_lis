<aside class="sidebar shadow-lg border-1">
    <div class="sidebar-title">
        <img src="{{ asset('default/' . config('app.logo')) }}" alt="logo">
        <p class="text-center w-100 fs-bold pt-3">{{ config('app.client') }}</p>
    </div>
    <ul class="sidebar-list">

        <!-- Home -->
        <li class="sidebar-item mt-1 {{ request()->routeIs('home.index') ? 'active' : '' }}">
            <a class="sidebar-link pe-5" href="{{ route('home.index') }}">
                <i class="fa-solid fa-house"></i> Home
            </a>
        </li>

        <!-- Members -->
        <li class="sidebar-item mt-1 {{ request()->routeIs('members.index') ? 'active' : '' }}">
            <a class="sidebar-link pe-5" href="{{ route('members.index') }}">
                <i class="fa-solid fa-users"></i> Members
            </a>
        </li>

        <!-- Standing Committee -->
        <li class="sidebar-item mt-1 {{ request()->is('standing-committee*') ? 'active' : '' }}">
            <a class="sidebar-link pe-5" href="{{ route('standing-committee.index') }}">
                <i class="fa-solid fa-people-group"></i> Standing Committee
            </a>
        </li>

        <!-- District Assignment -->
        <li class="sidebar-item mt-1 {{ request()->is('district-assignments*') ? 'active' : '' }}">
            <a class="sidebar-link pe-5" href="{{ route('district-assignments.index') }}">
                <i class="fa-solid fa-location-dot"></i> District Assignment
            </a>
        </li>

        <!-- Committee Report -->
        <li class="sidebar-item mt-1 {{ Route::currentRouteName() === 'committee-reports.index' ? 'active' : '' }}">
            <a class="sidebar-link pe-5" href="{{ route('committee-reports.index') }}">
                <i class="fa-solid fa-file-lines"></i> Committee Report
            </a>
        </li>

        <!-- Resolution -->
        <li class="sidebar-item mt-1 {{ request()->is('resolution*') ? 'active' : '' }}">
            <a class="sidebar-link pe-5" href="{{ route('resolution.index') }}">
                <i class="fa-solid fa-scroll"></i> Resolution
            </a>
        </li>

        <!-- Ordinance -->
        <li class="sidebar-item mt-1 {{ request()->is('ordinance*') ? 'active' : '' }}">
            <a class="sidebar-link pe-5" href="{{ route('ordinance.index') }}">
                <i class="fa-solid fa-scale-balanced"></i> Ordinance
            </a>
        </li>

        <!-- Session Meeting -->
        <li class="sidebar-item mt-1 {{ request()->is('session-meeting*') ? 'active' : '' }}">
            <a class="sidebar-link pe-5" href="{{ route('session-meeting.index') }}">
                <i class="fa-solid fa-handshake"></i> Session Meeting
            </a>
        </li>

        <!-- Executive Order -->
        <li class="sidebar-item mt-1 {{ request()->is('executive-order*') ? 'active' : '' }}">
            <a class="sidebar-link pe-5" href="{{ route('executive-order.index') }}">
                <i class="fa-solid fa-gavel"></i> Executive Order
            </a>
        </li>

        <!-- Photo Journal -->
        <li class="sidebar-item mt-1 {{ request()->is('photo-journals*') ? 'active' : '' }}">
            <a class="sidebar-link pe-5" href="{{ route('photo-journals.index') }}">
                <i class="fa-solid fa-camera"></i> Photo Journal
            </a>
        </li>

        <!-- Organizational Chart -->
        <li class="sidebar-item mt-1 {{ request()->is('organization*') ? 'active' : '' }}">
            <a href="{{ route('organization.index') }}" class="sidebar-link pe-5">
                <i class="fa-solid fa-sitemap"></i> Organizational Chart
            </a>
        </li>

        <!-- Calendar Events -->
        <li class="sidebar-item mt-1 {{ request()->is('calendar-event*') ? 'active' : '' }}">
            <a class="sidebar-link pe-5" href="{{ route('calendar-event.index') }}">
                <i class="fa-solid fa-calendar-days"></i> Calendar Events
            </a>
        </li>

        <!-- Barangay Officials -->
        <li class="sidebar-item mt-1 {{ request()->is('barangay-officials*') ? 'active' : '' }}">
            <a class="sidebar-link pe-5" href="{{ route('barangay-officials.index') }}">
                <i class="fa-solid fa-user-tie"></i> Barangay Officials
            </a>
        </li>
    </ul>
</aside>
