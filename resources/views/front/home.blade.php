@extends('layouts.front')

@section('content')

@section('title', 'Home')

@include('front.include.banner')


{{-- Who we are --}}
<div class="enrolled-area-two pt-100 pb-70">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="enrolled-img-three mb-30 pr-20">
                    <img src="assets/images/who-we-are.jpg" alt="Who-we-are">
                    {{-- <div class="enrolled-img-content">
                        <i class="flaticon-discount"></i>
                        <div class="content">
                            <h3>Get 40% off</h3>
                            <p>Every course</p>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="enrolled-content mb-30">
                    <div class="section-title">
                        <span>WHO WE ARE</span>
                        <h2>Building human capitals and creating market fields</h2>
                        <p>
                            The Future Map Media Concepts Limited is a world-class media
                            organization based in Nigeria. It was registered in October 2021 by
                            Corporate Affairs Commission, Nigeria.
                            We are a unique and credible media organization led by professionally
                            courteous, upwardly mobile founder- Desmond Nnadozie and his highly
                            innovative team. We are deeply committed to provide unparalleled
                            services to all our clients. Our combined years of experience spiced with
                            epic delivery speak volumes.

                        </p>
                        <p>
                            The Future Map Media Concepts Limited is modeling an excellent
                            leadership capacity in three thematic areas of focus:
                            Media
                            E-Commerce and
                            Education Services
                            Our strength lies in our quality commitment, integrity and reliability to
                            customer service underpinned with providing our clients with
                            breathtaking services.
                        </p>
                    </div>
                  
                    <a href="{{ route('about.us') }}" class="default-btn border-radius-5">Read More</a>
                </div>
            </div>
        </div>
    </div>
</div>

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

@if (count($members) > 0)
    <div class="instructors-area pb-70 pt-100">
        <div class="container">
            <div class="row mb-45">
                <div class="col-lg-8 col-md-9">
                    <div class="section-title mt-rs-20">
                        <h2>Meet our members</h2>
                        <p>
                            Headed by a skilled and passionate media and educationist entrepreneur,
                            our staff is made up of men and women of veteran capacities in the fields
                            of Education, media and Information and communication Technology,
                            with excellent records in business and corporate management. The
                            company has a numerical fourteen member permanent Staff and six
                            contract staff
                        </p>
                    </div>
                </div>

            </div>
            <div class="row justify-content-center">
                @foreach ($members as $member)
                    <div class="col-lg-3 col-md-6">
                        <div class="instructors-item">
                            <div class="instructors-img">
                                <a href="{{ route('company.profile', $member->id) }}">
                                    <img src="{{ asset('assets/images/members') }}/{{ $member->image }}"
                                        alt="{{ $member->name }}">
                                </a>
                                {{-- <ul class="instructors-social">
                            <li>
                                <a href="https://www.facebook.com/" target="_blank">
                                    <i class="ri-facebook-fill"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/" target="_blank">
                                    <i class="ri-instagram-line"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/" target="_blank">
                                    <i class="ri-twitter-fill"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.linkedin.com/" target="_blank">
                                    <i class="ri-linkedin-box-line"></i>
                                </a>
                            </li>
                        </ul> --}}
                            </div>
                            <div class="content">
                                <h3>
                                    <a href="{{ route('company.profile', $member->id) }}">{{ $member->name }}</a>
                                </h3>
                                <span>{{ $member->portfolio }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

@endif

{{-- <div class="testimonials-area pb-100">
    <div class="container">
        <div class="section-title mb-45 text-center">
            <h2>What our happy student say</h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                labore et dolore magna aliqua. Ut enim ad minim veniam.
            </p>
        </div>
        <div class="testimonials-slider owl-carousel owl-theme">
            <div class="testimonials-item">
                <img src="assets/images/testimonials/testimonials-img1.jpg" alt="testimonials" />
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
                <h3>Nikolas brooten</h3>
                <span>Student</span>
                <div class="quote">
                    <i class="flaticon-quote"></i>
                </div>
            </div>
            <div class="testimonials-item">
                <img src="assets/images/testimonials/testimonials-img2.jpg" alt="testimonials" />
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
                <h3>Terry ambady</h3>
                <span>Content strategist</span>
                <div class="quote">
                    <i class="flaticon-quote"></i>
                </div>
            </div>
            <div class="testimonials-item">
                <img src="assets/images/testimonials/testimonials-img3.jpg" alt="testimonials" />
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
                <h3>Cory zamora</h3>
                <span>Photographer</span>
                <div class="quote">
                    <i class="flaticon-quote"></i>
                </div>
            </div>
            <div class="testimonials-item">
                <img src="assets/images/testimonials/testimonials-img4.jpg" alt="testimonials" />
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
                <h3>Jonquil von</h3>
                <span>Photographer</span>
                <div class="quote">
                    <i class="flaticon-quote"></i>
                </div>
            </div>
        </div>
    </div>
</div> --}}


<div class="enrolled-area pb-70">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="enrolled-content">
                    <div class="section-title">
                        <h2>Our Partners</h2>
                        <p>
                            We are currently connecting, networking, and partnering with
                            both small, medium and multinational corporations. Such
                            corporations like, Think Counseling Network and Human
                            Development Initiative Abuja, Gregory University Abia State,
                            Cavendish University Uganda, Godfather Productions Abuja
                            and Reallog Media International Limited Abuja.

                        </p>
                        <p>
                            As a company with great focus on human capital investment,
                            we understand the forte in alliance, and therefore, are open to
                            strategic synergies to actualize our corporate vision and mission,
                            and providing satisfactory services and products to our clients.
                        </p>
                    </div>
                    {{-- <div class="row">
                        <div class="col-lg-6 col-6">
                            <ul class="enrolled-list">
                                <li>
                                    <i class="flaticon-check"></i>
                                    Full lifetime access
                                </li>
                                <li>
                                    <i class="flaticon-check"></i>
                                    Certificate of completion
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6 col-6">
                            <ul class="enrolled-list">
                                <li>
                                    <i class="flaticon-check"></i>
                                    20+ downloadable resources
                                </li>
                                <li>
                                    <i class="flaticon-check"></i>
                                    Free trial 7 days
                                </li>
                            </ul>
                        </div>
                    </div>
                    <a href="courses.html" class="default-btn">Enrolled today</a> --}}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="enrolled-img" data-speed="0.05" data-revert="true">
                    <img src="assets/images/partner.jpg" alt="partner" />
                    <div class="bg-shape">
                        <img src="assets/images/enrolled/enrolled-shape.png" alt="Shape" />
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>


<div class="enrolled-area pt-100 pb-70" style="background-color: #fff">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="enrolled-img-two mb-30" data-speed="0.05" data-revert="true">
                    <img src="assets/images/our-clients.jpg" alt="our client">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="enrolled-content mb-30">
                    <div class="section-title">
                        <h2>Our Clients</h2>
                        <p>
                            Our vast clientele includes educational institutions, business corporations,
                            government agencies, political organizations, community development
                            organizations, Non Profit organizations and the general public. Few among those
                            that have experienced our services at different times include;
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-6">
                            <ul class="enrolled-list">
                                <li><i class="flaticon-check"></i>Philomath University Abuja</li>
                                <li><i class="flaticon-check"></i>Colgate Toothpaste NIGERIA</li>
                                <li><i class="flaticon-check"></i> Regina Caeli Girls Secondary school Umunachi , Imo State</li>
                                <li><i class="flaticon-check"></i> Virgin Bras and Logistics Abuja
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6 col-6">
                            <ul class="enrolled-list">
                               
                               
                                <li><i class="flaticon-check"></i> KC Water Pool Nigeria Limited, Abuja
                                </li>
                                <li><i class="flaticon-check"></i> Pinnacle Health and Environmental Services Limited Abuja
                                </li>
                                <li><i class="flaticon-check"></i>Abas Rapid Link Owerri
                                </li>
                            </ul>
                        </div>
                    </div>
                    {{-- <a href="courses.html" class="default-btn">Enrolled today</a> --}}
                </div>
            </div>
        </div>
    </div>
</div>
{{-- 
<div class="blog-area pt-100 pb-70">
    <div class="container">
        <div class="row align-items-center mb-45">
            <div class="col-lg-8 col-md-9">
                <div class="section-title mt-rs-20">
                    <h2>Latest from our blogs</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-3 text-end">
                <a href="blog.html" class="default-btn">View all blogs</a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div class="blog-card">
                    <a href="single-blog-1.html">
                        <img src="assets/images/blog/blog-img1.jpg" alt="Blog">
                    </a>
                    <div class="content">
                        <ul>
                            <li>
                                <i class="ri-calendar-todo-fill"></i>
                                Jan 12,2022
                            </li>
                            <li>
                                <i class="ri-price-tag-3-fill"></i>
                                <a href="tags.html">Education</a>
                            </li>
                        </ul>
                        <h3>
                            <a href="single-blog-1.html">All that is wrong with codding in the field of apprentices</a>
                        </h3>
                        <p>Lorem ipsum dolor sit amet, constetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                        <a href="single-blog-1.html" class="read-btn">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="blog-card">
                    <a href="single-blog-1.html">
                        <img src="assets/images/blog/blog-img2.jpg" alt="Blog">
                    </a>
                    <div class="content">
                        <ul>
                            <li>
                                <i class="ri-calendar-todo-fill"></i>
                                Jan 13,2022
                            </li>
                            <li>
                                <i class="ri-price-tag-3-fill"></i>
                                <a href="tags.html">learning</a>
                            </li>
                        </ul>
                        <h3>
                            <a href="single-blog-1.html">How to use technology to adapt your talent to the world</a>
                        </h3>
                        <p>Lorem ipsum dolor sit amet, constetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                        <a href="single-blog-1.html" class="read-btn">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="blog-card">
                    <a href="single-blog-1.html">
                        <img src="assets/images/blog/blog-img3.jpg" alt="Blog">
                    </a>
                    <div class="content">
                        <ul>
                            <li>
                                <i class="ri-calendar-todo-fill"></i>
                                Jan 15,2022
                            </li>
                            <li>
                                <i class="ri-price-tag-3-fill"></i>
                                <a href="tags.html">Courses</a>
                            </li>
                        </ul>
                        <h3>
                            <a href="single-blog-1.html">Here are the things to look for when selecting an online
                                course</a>
                        </h3>
                        <p>Lorem ipsum dolor sit amet, constetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                        <a href="single-blog-1.html" class="read-btn">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
