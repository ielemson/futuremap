<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Future Map - User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{ asset('user/css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="{{ url('/') }}">Future Map</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{ route('dashboard.userprofile') }}">Settings</a></li>
                    {{-- <li><a class="dropdown-item" href="#!">Activity Log</a></li> --}}
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="{{ url('logout') }}"">Logout</a></li>
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
                        <a class="nav-link" href="{{ url('/dashboard') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Layouts
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('magazine.list') }}">Shop Magazine</a>
                                <a class="nav-link" href="{{ url('/') }}">Home Page</a>
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
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>

                    @php
                        $orders = App\Models\Orders::where('user_id', Auth::user()->id)->get();
                        // dd($orders);
                    @endphp

                    <div class="col-sm-8 col-md-11 col-lg-11 bg-white">
                        @if (count($orders) > 0)
                            <div class="customer-area">
                                @if (Session::has('purchase') == 1)
                                    <div class="alert text-large bg-success alert-success text-white" role="alert">
                                        You have successfully purchased a magzine, please click on the download buttnon
                                        to access your file.
                                    </div>
                                @endif

                                <div class="row pos-products layout-wrap" id="layout-wrap">
                                    @if (count($orders) > 0)
                                        @foreach ($orders as $order)
                                            <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                                                <div class="card">
                                                    <img class="card-img-top"
                                                        src="{{ asset('assets/images/products') }}/{{ $order->product->image }}"
                                                        alt="Magazine" style="width:aut0">
                                                    <div class="card-body">
                                                        <h4 class="card-title">{{ $order->product->name }}</h4>
                                                        {{--  --}}
                                                        <div class="btn-group" role="group"
                                                            aria-label="Magazine Buttons">
                                                            <a href="{{ asset('assets/magazine/uploads') }}/{{ $order->product->file }}"
                                                                class="text-medium btn btn-success btn-block mx-auto">Download</a>
                                                            {{-- <button type="button" class="btn btn-secondary">Middle</button> --}}
                                                            <a href="{{ route("read.pdf", $order->product->id) }}"
                                                                class="btn btn-info text-medium loadPdf"
                                                                {{-- data-id="{{ $order->product->id }}" --}}
                                                                >Read Magazine</a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                {{-- <button id="loadPdf">Load PDF</button> --}}
                                <iframe id="pdfIframe" width="100%" height="600px" style="display:none;"></iframe>
                            </div>
                        @else
                            <div class="box-shadow p-3 mx-auto" style="margin-top:100px">
                                <a href="{{ route('magazine.list') }}"
                                    class="btn btn-danger btn-checkout btn-pos-checkout ">YOU CURRENTLY DO NO HAVE ANY
                                    PRODUCT IN YOUR DASHBOARD. KINDLY PLACE ORDER</a>
                            </div>
                        @endif
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Future Map Media {{ Date('Y') }}</div>
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

    <script src="{{ asset('dist/js/jquery-3.6.4.min.js') }}" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('user/js/scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    {{-- <script src="assets/demo/chart-area-demo.js"></script> --}}
    {{-- <script src="assets/demo/chart-bar-demo.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    {{-- <script src="js/datatables-simple-demo.js"></script> --}}


    <script>
        // $(document).ready(function() {
        //     $('.loadPdf').on('click', function() {
        //         var pdfID = this.getAttribute('data-id');

        //         $.ajax({
        //             type: "GET",
        //             headers: {
        //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
        //                     'content')
        //             },
        //             url: `/get-pdf/${pdfID}`,
        //             method: "GET",
        //             dataType: "json",
        //             success: function(data) {
        //                 console.log(data)
        //                 // $('#pdfIframe').attr('src', data.pdfurl);
        //             },
        //             error: function() {
        //                 alert('PDF could not be loaded.');
        //             }

        //         });

        //     });
        // });
    </script>
</body>

</html>
