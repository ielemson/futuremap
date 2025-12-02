 <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="{{url("/")}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Home
                            </a>
                            <a class="nav-link" href="{{route("dashboard")}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                         @if ($vendor->accepted_terms == true)
                                <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link " href="{{route("vendor.product")}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Magazines
                            </a>
                            <a class="nav-link " href="{{route("vendor.profile")}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Profile
                            </a>
                            <a class="nav-link " href="{{route("vendor.profile")}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Wallet
                            </a>
                            <a class="nav-link " href="{{route("vendor.profile")}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Terms & Conditions
                            </a>
                         @endif
                            <a class="nav-link " href="{{url("/logout")}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Logout
                            </a>
                          
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                       {{Auth()->user()->name}}
                    </div>
                </nav>
            </div>