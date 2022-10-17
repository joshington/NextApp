<nav class="sidenav shadow-right sidenav-light">
    <div class="sidenav-menu">
        <div class="nav accordion" id="accordionSidenav">

            <!-- Sidenav Link (Home)-->
            <div class="sidenav-menu-heading">Home</div>
            <a class="nav-link {{ request()->routeIs('user') ? 'active' : '' }}" href="{{ route('user') }}">
                <div class="nav-link-icon"><i data-feather="grid"></i></div>
                Dashboard
            </a>

            <!-- Sidenav Accordion (Collections)-->
            <div class="sidenav-menu-heading">Transactions Section</div>
            <a class="nav-link @if (request()->routeIs('all_collections') || request()->routeIs('new_collections')) active @else collapsed @endif" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseCollections" aria-expanded="false" aria-controls="collapseCollections">
                <div class="nav-link-icon"><i data-feather="corner-left-down"></i></div>
                Collections
                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse {{ request()->routeIs('new_collections') ? 'show' : '' }} {{ request()->routeIs('all_collections') ? 'show' : '' }}" id="collapseCollections" data-bs-parent="#accordionSidenav">
                <nav class="sidenav-menu-nested nav">
                    <a class="nav-link {{ request()->routeIs('all_collections') ? 'active' : '' }}" href="{{ route('all_collections') }}">View Collections</a>
                    <a class="nav-link {{ request()->routeIs('new_collections') ? 'active' : '' }}" href="{{ route('new_collections') }}">Deposit To Account</a>
                </nav>
            </div>

            <!-- Sidenav Accordion (Withraws)-->
            <a class="nav-link @if (request()->routeIs('all_withdrawals') || request()->routeIs('new_withdrawal')) active @else collapsed @endif" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseWithraws" aria-expanded="false" aria-controls="collapseWithraws">
                <div class="nav-link-icon"><i data-feather="corner-left-up"></i></div>
                Withdrawals
                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse @if (request()->routeIs('all_withdrawals') || request()->routeIs('new_withdrawal')) show @endif" id="collapseWithraws" data-bs-parent="#accordionSidenav">
                <nav class="sidenav-menu-nested nav">
                    <a class="nav-link {{ request()->routeIs('all_withdrawals') ? 'active' : '' }}" href="{{ route('all_withdrawals') }}">View Withdrawals</a>
                    <a class="nav-link {{ request()->routeIs('new_withdrawal') ? 'active' : '' }}" href="{{ route('new_withdrawal') }}">Make Withdraw</a>
                </nav>
            </div>

            
            <a class="nav-link {{ request()->routeIs('all_links') ? 'active' : '' }}" href="{{ route('all_links') }}">
                <div class="nav-link-icon"><i data-feather="link"></i></div>
                Payment Links
            </a>
            
            <div class="sidenav-menu-heading">Settings Section</div>
            <a class="nav-link {{ request()->routeIs('all_businesses') ? 'active' : '' }}" href="{{ route('all_businesses') }}">
                <div class="nav-link-icon"><i data-feather="settings"></i></div>
                Business Settings
            </a>

            <a class="nav-link {{ request()->routeIs('api_home') ? 'active' : '' }} {{ request()->routeIs('api_settings') ? 'active' : '' }} {{ request()->routeIs('api_webhook') ? 'active' : '' }}" href="{{ route('api_home') }}">
                <div class="nav-link-icon"><i data-feather="command"></i></div>
                Developer Options
            </a>

            <a class="nav-link {{ request()->routeIs('account') ? 'active' : '' }}" href="{{ route('account') }}">
                <div class="nav-link-icon"><i data-feather="user"></i></div>
                My Account
            </a>


        </div>
    </div>
    <!-- Sidenav Footer-->
    <div class="sidenav-footer">
        <div class="sidenav-footer-content">
            <div class="sidenav-footer-subtitle">Logged In As:</div>
            <div class="sidenav-footer-title">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</div>
        </div>
    </div>
</nav>
