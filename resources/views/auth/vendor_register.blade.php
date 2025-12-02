@extends('layouts.front')


@section('content')
@section('title', 'Register Account')
{{-- @include('frontend.include.innerBanner', ['banner_title' => 'Register Account']) --}}

<div class="user-area pt-100 pb-70">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            {{-- <div class="col-lg-6">
                <div class="user-img">
                    <img src="assets/images/register.jpg" alt="faq"/>
                </div>
            </div> --}}
            <div class="col-lg-8">
                <div class="user-all-form">
                    <div class="contact-form">
{{-- @if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>There were some problems with your input:</strong>
<ul class="mb-0">
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif --}}
                        <h3 class="user-title">
                            Vendor Registration</h3>
                            
                       <form method="POST" action="{{ route('vendor.register.submit') }}" data-parsley-validate>
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}"  required data-parsley-required>
                             @error('first_name')
                                <div class="text-danger mt-1 small">{{ $message }}</div>
                                @enderror
                        </div>

                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}"  required data-parsley-required>
                             @error('last_name')
                                <div class="text-danger mt-1 small">{{ $message }}</div>
                                @enderror
                        </div>
                            </div>

                            <div class="col-md-6">
                                 <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}"  required data-parsley-pattern="^\+?[0-9]{10,15}$">
                             @error('phone')
                                <div class="text-danger mt-1 small">{{ $message }}</div>
                                @enderror
                        </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                            <label for="Email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required data-parsley-type="email">
                                @error('email')
                                <div class="text-danger mt-1 small">{{ $message }}</div>
                                @enderror
                        </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required data-parsley-minlength="8">
                              @error('password')
                                <div class="text-danger mt-1 small">{{ $message }}</div>
                                @enderror
                        </div>
                        
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required data-parsley-equalto="#password">
                        </div>
                        
                            </div>
                            <div class="col-md-6">
                            <div class="mb-3">
                             <div class="captcha">
                            <span>{!! captcha_img() !!}</span>
                            <button type="button" class="btn btn-danger" class="reload" id="reload">
                                &#x21bb;
                            </button>
                        </div>
                        </div>
                            </div>
                            
                            <div class="col-md-6">
                            <div class="mb-3">
                            <label for="captcha" class="form-label">Enter Captcha</label>
                            <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" required data-error="Captcha cannot be empty" name="captcha" required>
                              @error('captcha')
                                <div class="text-danger mt-1 small">{{ $message }}</div>
                            @enderror
                        </div> 
                            </div>
                        </div>

                       <div class="col-12">
                <div class="d-grid">
                    <div class="btn-group" role="group" aria-label="login">
                        <button type="submit" class="btn btn-success">Register</button>
                        &nbsp;
                        <a href="{{ url("/") }}" type="button" class="btn btn-warning">Go back </a>
                    </div>
                </div>

              </div>

              <div class="mt-4 text-center">
  <p class="mb-0">
    Already have an account ?
    <a href="{{route("login")}}" class="text-decoration-none text-primary fw-bold">Click here to login</a>
  </p>
</div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('extra-scripts')
<script src="https://cdn.jsdelivr.net/npm/parsleyjs@2.9.2/dist/parsley.min.js"></script>
<script type="text/javascript">
    $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: '/reload-captcha',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });
</script>
@endpush

@push("extra-css")
    <style>
       
        .parsley-equalto,.parsley-type,.parsley-required,.parsley-minlength{
            font-weight: 600;
            color: rgb(209, 13, 13);
            list-style-type:no;
            size: 0.5rem
        }
    </style>
@endpush
@endsection
