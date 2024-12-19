
<!doctype html>
<html lang="en">

<head>
  <!-- Required Meta Tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSS Files -->
  
<link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/logins/login-3/assets/css/login-3.css">
  <link rel="stylesheet" href="https://unpkg.com/bootstrap-icons@1.11.1/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://unpkg.com/prismjs@1.29.0/themes/prism.min.css">
  <link rel="stylesheet" href="https://bootstrapbrain.com/demo/lib/assets/css/demo.css">
  
  <!-- Google Adsense -->
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2038193463528200" crossorigin="anonymous"></script>
    
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-FE7BN2FH9J"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-FE7BN2FH9J');
  </script>
  </head>
<body>
  <!-- Main -->
<main id="main">
<!-- Login 3 - Bootstrap Brain Component -->
<section class="p-3 p-md-4 p-xl-5">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6 bsb-tpl-bg-platinum">
        <div class="d-flex flex-column justify-content-between h-100 p-3 p-md-4 p-xl-5">
          <h3 class="m-0" style="text-align: center">Future Map Media</h3>
          <img class="img-fluid rounded mx-auto my-4" loading="lazy" src="{{ asset('assets/images/favicon.png') }}" width="245" height="80" alt="future map media">
          {{-- <p class="mb-0"> Click here to go back <a href="{{ url("/") }}" class="link-secondary text-decoration-none"> Homepage</a></p> --}}
        </div>
      </div>
      <div class="col-12 col-md-6 bsb-tpl-bg-lotion">
        <div class="p-3 p-md-4 p-xl-5">
          <div class="row">
            <div class="col-12">
              <div class="mb-5">
                <h3>Sign In</h3>
              </div>
            </div>
          </div>
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="row gy-3 gy-md-4 overflow-hidden">
              <div class="col-12">
                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                <input type="email"  class="form-control py-2 @error('email') is-invalid @enderror" name="email"  required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
              </div>
              <div class="col-12">
                <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                <input type="password" class="form-control py-2 @error('password') is-invalid @enderror" name="password" id="password" required>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
              </div>
              
              <div class="col-12">
                <div class="d-grid">
                    <div class="btn-group" role="group" aria-label="login">
                        <button type="submit" class="btn btn-success">Login</button>
                        <a href="{{ url("/") }}" type="button" class="btn btn-warning">Go back </a>
                      </div>
                </div>

              </div>
            </div>
          </form>
         
        </div>
      </div>
    </div>
  </div>
</section>

  <!-- CSS Files -->
  <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="https://unpkg.com/prismjs@1.29.0/prism.js"></script>
  <script src="https://unpkg.com/clipboard@2.0.11/dist/clipboard.min.js"></script>
  <script src="https://unpkg.com/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
  <script src="https://unpkg.com/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>  <script src="https://bootstrapbrain.com/demo/lib/assets/js/clipboard.js"></script><script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"8f3f98b3a9b171f3","version":"2024.10.5","r":1,"token":"ad78a4c392ab4a12925f35a72e46b09a","serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}}}' crossorigin="anonymous"></script>
</body>

</html>
