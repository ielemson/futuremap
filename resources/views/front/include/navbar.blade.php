<div class="navbar-area ledu-area">
    <div class="mobile-responsive-nav">
        <div class="container">
            <div class="mobile-responsive-menu">
                <div class="logo">
                    <a href="{{url('/')}}">
                        <img src="{{asset('assets/images/logos/logo-small.png')}}" class="logo-one" alt="logo" width="50">
                        <img src="{{asset('assets/images/logos/logo-small.png')}}" class="logo-two" alt="logo" width="50">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="desktop-nav nav-area">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md navbar-light ">
                <a class="navbar-brand" href="{{url('/')}}">
                    <img src="{{asset('assets/images/logos/logo.png')}}" class="logo-one" alt="Logo" width="75">
                    <img src="{{asset('assets/images/logos/logo-small.png')}}" class="logo-two" alt="Logo" width="75">
                </a>
                {{-- <div class="nav-widget-form">
                    <form class="search-form">
                        <input type="search" class="form-control" placeholder="Search courses">
                        <button type="submit">
                            <i class="ri-search-line"></i>
                        </button>
                    </form>
                </div> --}}
                {{-- <div class="navbar-category">
                    <div class="dropdown category-list-dropdown">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButtoncategory" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class='flaticon-list'></i>
                            Our Services
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButtoncategory">
                           @if (count($services) > 0)
                               @foreach ($services as $service)
                               <a href="{{route('company.service',$service->id)}}" class="nav-link-item">
                              {{$service->header}}
                               </a>
                               @endforeach
                           @endif
                            
                          </div>
                    </div>
                </div> --}}
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{url('/')}}" class="nav-link {{ (request()->is('/')) ? 'active' : '' }}">
                                Home
                            </a>
                           
                        </li>
                        <li class="nav-item">
                            <a href="{{route('about.us')}}" class="nav-link {{ (request()->is('about-us')) ? 'active' : '' }}">
                                About Us
                            </a>
                          
                        </li>
                        <li class="nav-item">
                            <a href="{{route('company.profiles')}}" class="nav-link {{ (request()->is('company-profile*')) ? 'active' : '' }}">
                             Members
                            </a>
                          
                        </li>
                        <li class="nav-item">
                            <a href="{{route('company.projects')}}" class="nav-link {{ (request()->is('our-projects')) ? 'active' : '' }}">
                                Projects
                            </a>
                          
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle">
                                Our Services
                            </a>
                            <ul class="dropdown-menu">
                               
                                @if (count($services) > 0)
                                @foreach ($services as $service)
                               
                                <li class="nav-item">
                                    <a href="{{route('company.service',$service->id)}}" class="nav-link {{ (request()->is('our-service*')) ? 'active' : '' }}">
                                        {{$service->header}}
                                    </a>
                                </li>
                                @endforeach
                            @endif
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('contact.us')}}" class="nav-link {{ (request()->is('contact-us')) ? 'active' : '' }}">
                                Contact Us
                            </a>
                          
                        </li>
                     
                    </ul>
                    <div class="others-options d-flex align-items-center">
                        <div class="optional-item">
                            <a href="{{route('login')}}" class="default-btn one border-radius-5">Login</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div class="side-nav-responsive">
        <div class="container">
            <div class="dot-menu">
                <div class="circle-inner">
                    <div class="circle circle-one"></div>
                    <div class="circle circle-two"></div>
                    <div class="circle circle-three"></div>
                </div>
            </div>
            <div class="container">
                <div class="side-nav-inner">
                    <div class="side-nav justify-content-center align-items-center">
                        <div class="side-item">
                            <form class="search-form">
                                <input type="search" class="form-control" placeholder="Search courses">
                                <button type="submit">
                                    <i class="ri-search-line"></i>
                                </button>
                            </form>
                        </div>
                        <div class="side-item">
                            <a href="{{route('login')}}" class="default-btn one border-radius-5">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
