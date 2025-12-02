@extends('userType.vendor.vendor_layout')
@php

    $vendor = \App\Models\Vendor::where('user_id', auth()->user()->id)->first();

    // $vendorId = \App\Models\Vendor::where('id', $vendor_ref->id)->first();
    $orders = \App\Models\Orders::where('vendor_id', $vendor->id)->where('status', 'Successful')->get();

    // if (count($orders) > 0) {
    $totalQuantity = $orders->sum('qty');
    $totalSales = $orders->sum(function ($order) {
        return $order->qty * $order->price;
    });

    $commission = $totalSales * 0.1;

    // }

@endphp

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Vendor</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>

        @if ($vendor->accepted_terms == false)
            <div class="card shadow">
                <div class="card-body">
                    <h3 class="text-primary">Vendor Terms & Conditions</h3>
                    <p>Please read and accept our terms before proceeding to your dashboard.</p>

                    {{-- Alert Message --}}
                    <div id="alertBox" class="alert d-none" role="alert"></div>

                    <div class="terms-box p-3 bg-light border my-4" style="height: 300px; overflow-y: scroll;">
                      <h3 class="card-title text-center mb-4">📄 Vendor Terms and Conditions</h3>
      <p><strong>Effective Date:</strong> [Insert Date]</p>

      <h5>1. Account Registration</h5>
      <p>
        Vendors must provide accurate, complete, and updated information during registration.
        You are solely responsible for maintaining the confidentiality of your account credentials.
      </p>

      <h5>2. Product Listings</h5>
      <p>
        All products listed must be legal, accurate, and not infringe on any third-party rights.
        We reserve the right to review, approve, or remove any listings that violate our standards.
      </p>

      <h5>3. Referral System</h5>
      <p>
        Vendors will be provided a unique referral code or link.
        Commissions or bonuses earned through referrals are subject to verification and compliance with our referral policy.
      </p>

      <h5>4. Order Fulfillment</h5>
      <p>
        Vendors are responsible for managing and fulfilling their own orders in a timely and professional manner (if applicable).
        Any disputes arising from poor order handling may lead to penalties or suspension.
      </p>

      <h5>5. Payments and Payouts</h5>
      <p>
        Payments for sales will be processed through our platform and disbursed to the vendor's provided account as per our payout schedule.
        Payouts may be delayed due to verification or policy violations.
      </p>

      <h5>6. Commissions and Fees</h5>
      <p>
        The platform may charge a commission per sale, which will be deducted before payouts.
        All applicable fees will be communicated and updated on your dashboard.
      </p>

      <h5>7. Vendor Conduct</h5>
      <p>
        Vendors must maintain professionalism in communication with customers.
        Misuse of the platform, fraudulent activity, or spamming will result in account termination.
      </p>

      <h5>8. Termination</h5>
      <p>
        Either party may terminate the vendor relationship with notice.
        Upon termination, your access to the vendor dashboard and referral privileges will be revoked.
      </p>

      <h5>9. Modifications</h5>
      <p>
        We reserve the right to update these terms at any time.
        Continued use of the platform after changes implies acceptance of the new terms.
      </p>

      <h5>10. Limitation of Liability</h5>
      <p>
        We are not liable for any loss, damage, or legal action arising from your use of the platform as a vendor.
      </p>

      <h5>11. Governing Law</h5>
      <p>
        These terms shall be governed by and interpreted in accordance with the laws of [Your Country/State].
      </p>

      <hr>
      <p class="text-center">
        By clicking <strong>"Accept & Continue"</strong>, you confirm that you have read, understood, and agree to these Terms and Conditions.
      </p>
                    </div>

                    {{-- <form id="acceptTermsForm">
                    @csrf
                    <button type="submit" class="btn btn-success">I Accept & Continue</button>
                    </form> --}}

                    <form id="termsForm" method="POST" action="{{ route('vendor.accept.terms') }}">
                        @csrf
                        <div class="card shadow-sm mb-3">
                            <div class="card-body">
                                <h5 class="card-title text-danger">Terms & Conditions</h5>
                                <p class="card-text">
                                    Please read and accept our terms and conditions before proceeding to your dashboard.
                                </p>

                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" name="accepted" id="accepted" required>
                                    <label class="form-check-label" for="accepted">
                                        I agree to the Terms and Conditions
                                    </label>
                                </div>

                                <div id="terms-alert" class="mt-2"></div>

                                <button type="submit" class="btn btn-primary" id="acceptBtn" disabled>
                                    Accept & Continue
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        @else
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Your Referral Code:</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            {{ $vendor->referral_code }}
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-info text-white mb-4">
                        <div class="card-body">Total Sales</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            ₦{{ number_format($totalSales, 2) }}
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">Total Quantity Sold</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">Commission Earned</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            ₦{{ number_format($commission, 2) }}
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            @php
                // $referralLink = url('/magazines?vendor=' . $vendor->referral_code);
                $referralLink = $vendor->referral_code;
            @endphp

            <div class="mb-4">
                <label for="referralLink" class="form-label fw-semibold">Your Referral Link</label>
                <div class="input-group">
                    <input type="text" id="referralLink" class="form-control" value="{{ $referralLink }}" readonly>
                    <button class="btn btn-outline-secondary" type="button" onclick="copyReferral()">Copy</button>

                    {{-- WhatsApp --}}
                    <a href="https://wa.me/?text={{ urlencode('Check out this magazine: ' . $referralLink) }}"
                        target="_blank" class="btn btn-outline-success" title="Share on WhatsApp">
                        <i class="bi bi-whatsapp"></i>
                    </a>

                    {{-- Facebook --}}
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($referralLink) }}" target="_blank"
                        class="btn btn-outline-primary" title="Share on Facebook">
                        <i class="bi bi-facebook"></i>
                    </a>

                    {{-- Twitter (X) --}}
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode($referralLink) }}&text={{ urlencode('Get amazing magazines here!') }}"
                        target="_blank" class="btn btn-outline-dark" title="Share on X">
                        <i class="bi bi-twitter-x"></i>
                    </a>
                </div>
            </div>
        @endif
    </div>
    @push('jscustom')
        <script>
            function copyReferral() {
                const input = document.getElementById("referralLink");
                navigator.clipboard.writeText(input.value).then(() => {
                    alert("Referral link copied to clipboard!");
                });
            }
        </script>


        <script>
            $(document).ready(function() {
                // Enable/disable button based on checkbox
                $('#accepted').on('change', function() {
                    $('#acceptBtn').prop('disabled', !this.checked);
                });

                $('#termsForm').on('submit', function(e) {
                    e.preventDefault();

                    const url = $(this).attr('action');
                    const data = $(this).serialize();

                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: data,
                        success: function(response) {
                            console.log(response)
                            $('#terms-alert').html(`
<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Success!</strong> ${response.message || 'Terms accepted successfully.'}
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
`);
                            setTimeout(() => {
                                location.reload();
                            }, 1500);
                        },
                        error: function(xhr) {
                            let errMsg = 'Something went wrong.';
                            if (xhr.responseJSON?.message) {
                                errMsg = xhr.responseJSON.message;
                            }
                            $('#terms-alert').html(`
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Error!</strong> ${errMsg}
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
`);
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection
