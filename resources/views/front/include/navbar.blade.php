<div class="navbar-area ledu-area">
    <div class="mobile-responsive-nav">
        <div class="container">
            <div class="mobile-responsive-menu">
                <div class="logo">
                    <a href="{{url('/')}}">
                        <img src="assets/images/logos/logo-small.png" class="logo-one" alt="logo" width="50">
                        <img src="assets/images/logos/logo-small-white.png" class="logo-two" alt="logo" width="50">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="desktop-nav nav-area">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md navbar-light ">
                <a class="navbar-brand" href="{{url('/')}}">
                    <img src="assets/images/logos/logo.png" class="logo-one" alt="Logo" width="75">
                    <img src="assets/images/logos/logo-2.png" class="logo-two" alt="Logo" width="75">
                </a>
                {{-- <div class="nav-widget-form">
                    <form class="search-form">
                        <input type="search" class="form-control" placeholder="Search courses">
                        <button type="submit">
                            <i class="ri-search-line"></i>
                        </button>
                    </form>
                </div> --}}
                <div class="navbar-category">
                    <div class="dropdown category-list-dropdown">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButtoncategory" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class='flaticon-list'></i>
                            Categories
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButtoncategory">
                            <a href="courses-details.html" class="nav-link-item">
                                <i class="flaticon-web-development"></i>
                                Development
                            </a>
                            <a href="">
                                <i class="flaticon-design"></i>
                                Web designing
                            </a>
                            <a href="">
                                <i class="flaticon-wellness"></i>
                                Lifestyle
                            </a>
                          </div>
                    </div>
                </div>
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
                            <a href="{{route('company.profile')}}" class="nav-link {{ (request()->is('company-profile')) ? 'active' : '' }}">
                                Company Profile
                            </a>
                          
                        </li>
                        <li class="nav-item">
                            <a href="{{route('contact.us')}}" class="nav-link {{ (request()->is('contact-us')) ? 'active' : '' }}">
                                Contact Us
                            </a>
                          
                        </li>
                     
                    </ul>
                    <div class="others-options d-flex align-items-center">
                        <div class="optional-item">
                            <a href="" class="default-btn two">Sign Up</a>
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
                            <a href="signup.html" class="default-btn two">Sign Up</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
