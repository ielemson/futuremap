@extends('userType.vendor.vendor_layout')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Vendor</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Products</li>
        </ol>
     <div class="row">
    @foreach($magazines as $magazine)
        @php
            $refLink = url('/magazine/' . $magazine->slug . '?vendor=' . $vendor->referral_code);
        @endphp

        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('assets/images/products') }}/{{ $magazine->image }}" class="card-img-top" alt="{{ $magazine->title }}" style="height: 200px; object-fit: cover;">

                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $magazine->name }}</h5>
                    <p class="card-text fw-bold text-success">₦{{ number_format($magazine->price) }}</p>

                    <!-- Hidden referral link -->
                    <input type="hidden" id="referral_{{ $magazine->id }}" value="{{ $refLink }}">

                    <!-- Share/Copy buttons -->
                    <div class="mt-auto">
                        <div class="d-flex flex-wrap gap-2 mb-3">
                            <button class="btn btn-sm btn-outline-secondary" onclick="copyLink('referral_{{ $magazine->id }}')">
                                <i class="bi bi-clipboard"></i> Copy
                            </button>

                            <a href="https://wa.me/?text={{ urlencode('Check this out: ' . $refLink) }}" target="_blank" class="btn btn-sm btn-outline-success" title="WhatsApp">
                                <i class="bi bi-whatsapp"></i>
                            </a>

                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($refLink) }}" target="_blank" class="btn btn-sm btn-outline-primary" title="Facebook">
                                <i class="bi bi-facebook"></i>
                            </a>

                            <a href="https://twitter.com/intent/tweet?url={{ urlencode($refLink) }}&text={{ urlencode('Check out this magazine!') }}" target="_blank" class="btn btn-sm btn-outline-dark" title="X">
                                <i class="bi bi-twitter-x"></i>
                            </a>

                            <a href="https://www.instagram.com" target="_blank" class="btn btn-sm btn-outline-danger" title="Instagram">
                                <i class="bi bi-instagram"></i>
                            </a>

                            <a href="https://www.tiktok.com/upload" target="_blank" class="btn btn-sm btn-outline-dark" title="TikTok">
                                <i class="bi bi-tiktok"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light">
                    <small class="text-muted">
                        {{ \Illuminate\Support\Str::limit($magazine->description, 200) }}
                    </small>
                </div>
            </div>
        </div>
    @endforeach
</div>

<!-- Toast Container -->
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1055">
    <div id="copyToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                ✅ Referral link copied to clipboard!
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>



</div>
@push("jscustom")
    <script>
    function copyLink(inputId) {
        const input = document.getElementById(inputId);
        navigator.clipboard.writeText(input.value).then(() => {
            // Show toast
            var toast = new bootstrap.Toast(document.getElementById('copyToast'));
            toast.show();
        });
    }
</script>
@endpush
    
@endsection
