<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="{{ route('dashboard') }}">
            <div class="logo-img">
                <img height="30" src="{{ asset('img/logo.png') }}" class="header-brand-img" title="FMAP">
            </div>
        </a>
        <div class="sidebar-action"><i class="ik ik-arrow-left-circle"></i></div>
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
    </div>

    @php
        $segment1 = request()->segment(1);
        $segment2 = request()->segment(2);
    @endphp

    <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-item {{ $segment1 == 'dashboard' ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}"><i
                            class="ik ik-bar-chart-2"></i><span>{{ __('Dashboard') }}</span></a>
                </div>
                @hasrole('Super Admin')
                    <div class="nav-lavel">{{ __('Layouts') }} </div>
                    {{-- <div class="nav-item {{ $segment1 == 'pos' ? 'active' : '' }}">
                        <a href="{{ url('inventory') }}"><i
                                class="ik ik-shopping-cart"></i><span>{{ __('Inventory') }}</span> <span
                                class=" badge badge-success badge-right">{{ __('New') }}</span></a>
                    </div> --}}
                    {{-- <div class="nav-item {{ $segment1 == 'pos' ? 'active' : '' }}">
                        <a href="{{ url('pos') }}"><i class="ik ik-printer"></i><span>{{ __('POS') }}</span> <span
                                class=" badge badge-success badge-right">{{ __('New') }}</span></a>
                    </div> --}}
                    <div
                        class="nav-item {{ $segment1 == 'users' || $segment1 == 'roles' || $segment1 == 'permission' || $segment1 == 'user' ? 'active open' : '' }} has-sub">
                        <a href="#"><i class="ik ik-user"></i><span>{{ __('Adminstrator') }}</span></a>
                        <div class="submenu-content">
                            <!-- only those have manage_user permission will get access -->
                            @can('manage_user')
                                <a href="{{ url('users') }}"
                                    class="menu-item {{ $segment1 == 'users' ? 'active' : '' }}">{{ __('Users') }}</a>
                                <a href="{{ url('user/create') }}"
                                    class="menu-item {{ $segment1 == 'user' && $segment2 == 'create' ? 'active' : '' }}">{{ __('Add User') }}</a>
                            @endcan
                            <!-- only those have manage_role permission will get access -->
                            @can('manage_roles')
                                <a href="{{ url('roles') }}"
                                    class="menu-item {{ $segment1 == 'roles' ? 'active' : '' }}">{{ __('Roles') }}</a>
                            @endcan
                            <!-- only those have manage_permission permission will get access -->
                            @can('manage_permission')
                                <a href="{{ url('permission') }}"
                                    class="menu-item {{ $segment1 == 'permission' ? 'active' : '' }}">{{ __('Permission') }}</a>
                            @endcan
                        </div>
                    </div>
                   
                    {{-- Product Menu Starts --}}
                    <div class="nav-lavel">{{ __('Product') }} </div>
                    <div class="nav-item {{ ($segment1 == 'products') ? 'active open' : '' }} has-sub">
                        <a href="#"><i class="ik ik-headphones"></i><span>{{ __('Products')}}</span></a>
                        <div class="submenu-content">
                            <a href="{{url('products/create')}}" class="menu-item {{ ($segment1 == 'products' && $segment2 == 'create') ? 'active' : '' }}">{{ __('Add Product')}}</a>
                            <a href="{{url('products')}}" class="menu-item {{ ($segment1 == 'products' && $segment2 == '') ? 'active' : '' }}">{{ __('List Producs')}}</a>
                        </div>
                    </div>
                    {{--  Personality Update  Menu Starts --}}
                    <div class="nav-lavel">{{ __(' Personality Update') }} </div>
                    <div class="nav-item {{ ($segment1 == 'personality') ? 'active open' : '' }} has-sub">
                        <a href="#"><i class="ik ik-headphones"></i><span>{{ __(' Personality Update')}}</span></a>
                        <div class="submenu-content">
                            <a href="{{route('personality.create')}}" class="menu-item {{ ($segment1 == 'personality' && $segment2 == 'create') ? 'active' : '' }}">{{ __('Add Profile')}}</a>
                            <a href="{{route('personality.index')}}" class="menu-item {{ ($segment1 == 'personality' && $segment2 == '') ? 'active' : '' }}">{{ __('List Profile')}}</a>
                        </div>
                    </div>
                      {{-- COMPETITION ROUTES STARTS HERE :::::::::::::::::::::::::::::::::::: --}}
                <div
                class="nav-item {{ $segment1 == 'competition' || $segment1 == 'user' ? 'active open' : '' }} has-sub">
                <a href="#"><i class="ik ik-users"></i><span>{{ __('Competition') }}</span></a>
                <div class="submenu-content">
                    <!-- only those have manage_user permission will get access -->
                    <a href="{{ route('competiiton.list') }}"
                        class="menu-item {{ $segment1 == 'news' && $segment2 == 'create' ? 'active' : '' }}">{{ __('Competition List') }}</a>

                </div>
            </div>

            {{-- COMPETITION ROUTES END HERE :::::::::::::::::::::::::::::::::::: --}}
                @endhasrole
               
                {{-- News Route Starts Here::::::::::::::::::::::::::: --}}
                <div class="nav-lavel">{{ __('News Post') }} </div>
                <div
                    class="nav-item {{ $segment1 == 'news' || $segment1 == 'roles' || $segment1 == 'permission' || $segment1 == 'user' ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-file-text"></i><span>{{ __('News') }}</span></a>
                    <div class="submenu-content">
                        <!-- only those have manage_user permission will get access -->
                        <a href="{{ route('news.create') }}"
                            class="menu-item {{ $segment1 == 'news' && $segment2 == 'create' ? 'active' : '' }}">{{ __('Create News') }}</a>
                        <a href="{{ route('news.list') }}"
                            class="menu-item {{ $segment1 == 'news' && $segment2 == 'create' ? 'active' : '' }}">{{ __('News List') }}</a>
                        <a href="{{ route('news.category') }}"
                            class="menu-item {{ $segment1 == 'news' && $segment2 == 'create' ? 'active' : '' }}">{{ __('News Categories') }}</a>
                    </div>
                </div>

                {{-- News Route Ends Here::::::::::::::::::::::::::: --}}

                {{-- Features --}}
                <div
                    class="nav-item {{ $segment1 == 'features' || $segment1 == 'roles' || $segment1 == 'permission' || $segment1 == 'user' ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-star"></i><span>{{ __('Features') }}</span></a>
                    <div class="submenu-content">
                        <!-- only those have manage_user permission will get access -->
                        <a href="{{ url('feature/list') }}"
                            class="menu-item {{ $segment1 == 'user' && $segment2 == 'create' ? 'active' : '' }}">{{ __('Features') }}</a>
                        <a href="{{ url('feature/create') }}"
                            class="menu-item {{ $segment1 == 'user' && $segment2 == 'create' ? 'active' : '' }}">{{ __('Add Features') }}</a>


                    </div>
                </div>
                {{-- CUSTOM SIDEBAR  :::::::::::::::::::::::::::::: ENDS --}}

                {{-- Setting Menu Starts --}}
                <div class="nav-lavel">{{ __('General Setting') }} </div>
                <div class="nav-item {{ $segment1 == 'setting' ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-file-text"></i><span>{{ __('Setting') }}</span></a>
                    <div class="submenu-content">
                        <!-- only those have manage_user permission will get access -->
                        <a href="{{ route('website-setting.edit') }}"
                            class="menu-item {{ $segment1 == 'setting' && $segment2 == 'website-setting' ? 'active' : '' }}">{{ __('Website Settings') }}
                        </a>
                    </div>
                </div>

                <div class="nav-item {{ $segment1 == 'slider' ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-file-text"></i><span>{{ __('Slider Menu') }}</span></a>
                    <div class="submenu-content">
                        <!-- only those have manage_user permission will get access -->
                        <a href="{{ route('slider.create') }}"
                            class="menu-item {{ $segment1 == 'slider' && $segment2 == 'create' ? 'active' : '' }}">{{ __('Create Slider') }}</a>
                        <a href="{{ route('slider.list') }}"
                            class="menu-item {{ $segment1 == 'slider' && $segment2 == 'create' ? 'active' : '' }}">{{ __('Slider List') }}</a>
                    </div>
                </div>
                
                 {{-- CUSTOM SIDEBAR  :::::::::::::::::::::::::::::: STARTS --}}
            <div
            class="nav-item {{  $segment1 == 'service' ? 'active open' : '' }} has-sub">
            <a href="#"><i class="ik ik-settings"></i><span>{{ __('Services') }}</span></a>
            <div class="submenu-content">
                <!-- only those have manage_user permission will get access -->
                <a href="{{ url('service/list') }}"
                    class="menu-item {{ $segment1 == 'service' && $segment2 == 'list' ? 'active' : '' }}">{{ __('List Service') }}
                </a>
                <a href="{{ url('service/create') }}"
                    class="menu-item {{ $segment1 == 'service' && $segment2 == 'create' ? 'active' : '' }}">{{ __('Add Service') }}
                </a>
            </div>
        </div>

        {{-- PROJECT SIDEBAR  :::::::::::::::::::::::::::::: STARTS --}}
        <div
            class="nav-item {{  $segment1 == 'project' ? 'active open' : '' }} has-sub">
            <a href="#"><i class="ik ik-settings"></i><span>{{ __('Projects') }}</span></a>
            <div class="submenu-content">
                <!-- only those have manage_user permission will get access -->
                <a href="{{ url('project/list') }}"
                    class="menu-item {{ $segment1 == 'service' && $segment2 == 'list' ? 'active' : '' }}">{{ __('List Project') }}
                </a>
                <a href="{{ url('project/create') }}"
                    class="menu-item {{ $segment1 == 'service' && $segment2 == 'create' ? 'active' : '' }}">{{ __('Add Project') }}
                </a>
            </div>
        </div>
              
                {{-- @hasrole('Super Admin')

                @endhasrole --}}
        </div>
    </div>
</div>
