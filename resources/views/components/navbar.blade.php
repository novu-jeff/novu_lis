<nav class="navbar navbar-expand-md navbar-dark bg-primary sticky-top shadow" style="height: 50px">
    <div class="container d-flex justify-content-md-between">
        <div></div>
        <div class="text-white">
            <h5 class="m-0 text-capitalize">{{ Auth::user()->organization->company_name ?? '' }}</h5>
        </div>
        <div class="dropdown d-none d-lg-block">
            <a class="nav-link text-white text-capitalize" href="" role="button">
                Novulutions, Inc.
            </a>

        </div>

        <!-- Hamburger Links -->
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
