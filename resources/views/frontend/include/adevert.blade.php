@php
    $setting = \App\Models\Setting::find(1);
@endphp
<div class="section-bg pb-70">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-6"  
            data-aos="fade-right"
            data-aos-offset="100"
            data-aos-easing="ease-in-sine">
            
                <div class="enrolled-img-three pt-70" data-speed="0.05" data-revert="true">
                    <img src="{{asset('assets/images/advert.jpeg')}}" alt="advert" />
                   
                </div>
            </div>
            <div class="col-lg-6" 
            data-aos="fade-up"
            data-aos-offset="200"
            data-aos-easing="ease-in-sine"
            >
                <div class="enrolled-content">
                    <div class="section-title text-center">
                        <h2>Our PR Packages</h2>
                    </div>
                  {!! $setting->pr_package !!}
                </div>
            </div>
           
        </div>
    </div>
</div>
