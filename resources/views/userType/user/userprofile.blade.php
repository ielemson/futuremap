<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Future Map - User Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{ asset("user/css/styles.css") }}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="{{ url("/") }}">Future Map</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{url('profile')}}">Settings</a></li>
                        {{-- <li><a class="dropdown-item" href="#!">Activity Log</a></li> --}}
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="{{ url('logout') }}">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="{{ url("/dashboard") }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
							<div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
							<div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route("magazine.list") }}">Shop Magazine</a>
                                    <a class="nav-link" href="{{ url("/") }}">Home Page</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                       {{ Auth::user()->email }}
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <div class="page-header">
                            <div class="row align-items-end">
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                        <i class="ik ik-file-text bg-blue"></i>
                                        <div class="d-inline">
                                            <h5>{{ __('Profile')}}</h5>
                                            <span>{{ __('Edit Profile')}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="{{route('dashboard')}}"><i class="ik ik-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item">
                                                <a href="#">{{ __('Pages')}}</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">{{ __('Profile')}}</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center"> 
                                            <img src="../img/user.jpg" class="rounded-circle" width="150" />
                                            <h4 class="card-title mt-10">{{ Auth::user()->name}}</h4>
                                            <p class="card-subtitle">
                                            @role('Admin')
                                              Super Admin
                                            @endrole 
                                            @role('New Manager')
                                              News Manager
                                            @endrole 
                                           
                                            </p>
                                            {{-- <div class="row text-center justify-content-md-center">
                                                <div class="col-4"><a href="javascript:void(0)" class="link"><i class="ik ik-user"></i> <font class="font-medium">254</font></a></div>
                                                <div class="col-4"><a href="javascript:void(0)" class="link"><i class="ik ik-image"></i> <font class="font-medium">54</font></a></div>
                                            </div> --}}
                                        </div>
                                    </div>
                                    <hr class="mb-0"> 
                                    <div class="card-body"> 
                                        <small class="text-muted d-block">{{ __('Email address')}} </small>
                                        <h6>{{Auth::user()->email}}</h6> 
                                        <small class="text-muted d-block pt-10">{{ __('Phone')}}</small>
                                        <h6>{{Auth::user()->phone}}</h6> 
                                        <small class="text-muted d-block pt-10">{{ __('Address')}}</small>
                                        <h6>Abuja Nigeria</h6>
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d61416027.02238448!2d51.2165195!3d-20.027946!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x104e745f4cd62fd9%3A0x53bd17b4a20ea12b!2sAbuja%2C%20Federal%20Capital%20Territory!5e0!3m2!1sen!2sng!4v1703168269803!5m2!1sen!2sng" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                        <small class="text-muted d-block pt-30">{{ __('Social Profile')}}</small>
                                        <br/>
                                        <button class="btn btn-icon btn-facebook"><i class="fab fa-facebook-f"></i></button>
                                        <button class="btn btn-icon btn-twitter"><i class="fab fa-twitter"></i></button>
                                        <button class="btn btn-icon btn-instagram"><i class="fab fa-instagram"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-7">
                                <div class="card">
                                    <div class="card-body">
                                        <form class="form-horizontal" action="{{route('account.update')}}">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="example-name">{{ __('Full Name')}}</label>
                                                    <input type="text" class="form-control" name="name" id="example-name" value="{{Auth::user()->name}}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="example-email">{{ __('Email')}}</label>
                                                    <input type="email"  class="form-control" name="email" value="{{Auth::user()->email}}" id="example-email">
                                                </div>
                                               @hasrole('Super Admin')
                                               <div class="form-group">
                                                <label for="example-password">{{ __('Password')}}</label>
                                                <input type="password"  class="form-control" name="password" id="example-password">
                                            </div>
                                            <div class="form-group">
                                                <label for="example-password">{{ __('Confirm Password')}}</label>
                                                <input type="password"  class="form-control" name="password_confirmation" id="example-password">
                                            </div>
                                               @endhasrole
                                                <div class="form-group">
                                                    <label for="example-phone">{{ __('Phone No')}}</label>
                                                    <input type="text" placeholder="Phone number" id="example-phone" name="phone" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                  
                                                <button class="btn btn-success" type="submit">Update Profile</button>
                                            </form>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Future Map Media {{ Date("Y") }}</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset("user/js/scripts.js") }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        {{-- <script src="assets/demo/chart-area-demo.js"></script> --}}
        {{-- <script src="assets/demo/chart-bar-demo.js"></script> --}}
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        {{-- <script src="js/datatables-simple-demo.js"></script> --}}
    </body>
</html>
