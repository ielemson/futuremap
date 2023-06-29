@extends('layouts.front')


@section('content')
@section('title', 'About Us')
@include('front.include.innerBanner', ['banner_title' => 'About Us'])


<div class="enrolled-area-two pt-100 pb-70">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-4">
                <div class="enrolled-img-three mb-30 pr-20">
                    <img src="assets/images/who-we-are.jpeg" alt="Who-we-are">
                    {{-- <div class="enrolled-img-content">
                        <i class="flaticon-discount"></i>
                        <div class="content">
                            <h3>Get 40% off</h3>
                            <p>Every course</p>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="col-lg-8">
                <div class="enrolled-content mb-30">
                    <div class="section-title">
                        <span>WHO WE ARE</span>
                        <h2>Building human capitals and creating market fields</h2>
                        <p>
                          
                            The Future Map Media Concepts Limited is a world-class media organization based in Nigeria. It was registered in October 2021 by Corporate Affairs Commission, Nigeria. We are a unique and credible media organization led by professionally courteous, upwardly mobile founder- Desmond Nnadozie and his highly innovative team. We are deeply committed to provide unparalleled services to all our clients. Our combined years of experience spiced with epic delivery speak volumes.
                        </p>
                        <p>
                            The Future Map Media Concepts Limited is modeling an excellent leadership capacity in three thematic areas of focus: Media, E-Commerce and Education Services. Our strength lies in our quality, commitment, integrity and reliability to customer service underpinned with providing our clients with breathtaking services.
                        </p>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
</div>


<div class="counter-area-three pb-70">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-6">
                <div class="featured-item">
                    <i class="flaticon-effective"></i>
                    <h3>Our Motto</h3>
                    <p>Building human capitals, creating market-fields.</p>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <div class="featured-item">
                    <i class="flaticon-effective"></i>
                    <h3>Our Mission</h3>
                    <p>
                        We are passionate in building human capital, wealth
                        creation and creating an excellent leadership pathway
                        through robust engagement with people, and engaging with
                        strategic partners.</p>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <div class="featured-item">
                    <i class="flaticon-effective"></i>
                    <h3>Our Vision</h3>
                    <p>
                        To be a leading global player in transformational
                        leadership, education and wealth creation, serving local
                        and global clientele with excellent track records that
                        exceed expectations.</p>
                </div>
            </div>
           
        </div>
    </div>
</div>


{{-- <div class="testimonials-area section-bg pt-100 pb-100">
    <div class="container">
        <div class="section-title text-center">
            <span>TESTIMONIAL</span>
            <h2>What people say about us</h2>
        </div>
        <div class="testimonials-slider-two owl-carousel owl-theme">
            <div class="testimonials-card-two">
                <div class="rating">
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                </div>
                <p>“Morbi porttitor ligula id varius consectetur. Integer ipsum justo, congue sit amet massa vel,
                    porttitor semper magna. Orci varius natoque penatibus et magnis dis parturient montes, nascetur
                    ridiculus.”</p>
                <div class="content">
                    <img src="assets/images/testimonials/testimonials-img1.jpg" alt="testimonials" />
                    <h3>Nikolas brooten</h3>
                    <span>Student</span>
                </div>
                <div class="quote">
                    <i class="flaticon-quote"></i>
                </div>
            </div>
            <div class="testimonials-card-two">
                <div class="rating">
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                </div>
                <p>“Morbi porttitor ligula id varius consectetur. Integer ipsum justo, congue sit amet massa vel,
                    porttitor semper magna. Orci varius natoque penatibus et magnis dis parturient montes, nascetur
                    ridiculus.”</p>
                <div class="content">
                    <img src="assets/images/testimonials/testimonials-img2.jpg" alt="testimonials" />
                    <h3>Terry ambady</h3>
                    <span>Content strategist</span>
                </div>
                <div class="quote">
                    <i class="flaticon-quote"></i>
                </div>
            </div>
            <div class="testimonials-card-two">
                <div class="rating">
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                </div>
                <p>“Morbi porttitor ligula id varius consectetur. Integer ipsum justo, congue sit amet massa vel,
                    porttitor semper magna. Orci varius natoque penatibus et magnis dis parturient montes, nascetur
                    ridiculus.”</p>
                <div class="content">
                    <img src="assets/images/testimonials/testimonials-img3.jpg" alt="testimonials" />
                    <h3>Cory zamora</h3>
                    <span>Photographer</span>
                </div>
                <div class="quote">
                    <i class="flaticon-quote"></i>
                </div>
            </div>
            <div class="testimonials-card-two">
                <div class="rating">
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                </div>
                <p>“Morbi porttitor ligula id varius consectetur. Integer ipsum justo, congue sit amet massa vel,
                    porttitor semper magna. Orci varius natoque penatibus et magnis dis parturient montes, nascetur
                    ridiculus.”</p>
                <div class="content">
                    <img src="assets/images/testimonials/testimonials-img3.jpg" alt="testimonials" />
                    <h3>Jonquil von</h3>
                    <span>Photographer</span>
                </div>
                <div class="quote">
                    <i class="flaticon-quote"></i>
                </div>
            </div>
        </div>
    </div>
</div> --}}
{{-- our core values --}}
<div class="featured-area section-bg pt-100 pb-70">
    <div class="container-fluid">
        <div class="row mb-45">
            <div class="col-lg-8 col-md-9">
                <div class="section-title mt-rs-20">
                    <h2>Our Core Values</h2>
                    <p>Our system is built on the values of proficiency, fidelity, humanity, vision and
                        service.</p>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-4 col-6">
                <div class="featured-item">
                    <i class="flaticon-effective"></i>
                    <h3>Proficiency </h3>
                    <p>We bring expertise to work.</p>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <div class="featured-item">
                    <i class="flaticon-effective"></i>
                    <h3>Fidelity</h3>
                    <p>We keep to our agreements</p>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <div class="featured-item">
                    <i class="flaticon-effective"></i>
                    <h3>Humanity</h3>
                    <p>We are considerate in our dealings and negotiations.</p>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <div class="featured-item">
                    <i class="flaticon-effective"></i>
                    <h3>Vision</h3>
                    <p>We help our clients see clearly and live their expectations
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <div class="featured-item">
                    <i class="flaticon-effective"></i>
                    <h3>Service</h3>
                    <p>We give our best to the satisfaction of our clients
                    </p>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="newsletter-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="section-title mt-rs-20">
                    <span>ARE YOU IMPRESSED FOR AMAZING SERVICES?</span>
                    <h2>Subscribe our newsletter</h2>
                </div>
            </div>
            <div class="col-lg-7">
                <form class="newsletter-form" data-toggle="validator" method="POST">
                    <input type="email" class="form-control" placeholder="Enter Your Email Address" name="EMAIL"
                        required autocomplete="off">
                    <button class="subscribe-btn" type="submit">
                        Subscribe Now
                        <i class="flaticon-paper-plane"></i>
                    </button>
                    <div id="validator-newsletter" class="form-result"></div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
