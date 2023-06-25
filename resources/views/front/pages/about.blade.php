@extends('layouts.front')


@section('content')
@section('title', 'About Us')  
@include('front.include.innerBanner',['banner_title'=>'About Us'])


<div class="enrolled-area-two pt-100 pb-70">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="enrolled-img-three mb-30 pr-20">
                    <img src="assets/images/enrolled/enrolled-img3.jpg" alt="Enrolled">
                    <div class="enrolled-img-content">
                        <i class="flaticon-discount"></i>
                        <div class="content">
                            <h3>Get 40% off</h3>
                            <p>Every course</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="enrolled-content mb-30">
                    <div class="section-title">
                        <span>WHO WE ARE</span>
                        <h2>We have the most qualified instructors in your hometown.</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-6">
                            <ul class="enrolled-list">
                                <li>
                                    <i class="flaticon-check"></i>
                                    Full lifetime access</li>
                                <li>
                                    <i class="flaticon-check"></i>
                                    Certificate of completion</li>
                            </ul>
                        </div>
                        <div class="col-lg-6 col-6">
                            <ul class="enrolled-list">
                                <li>
                                    <i class="flaticon-check"></i>
                                    20+ downloadable resources</li>
                                <li>
                                    <i class="flaticon-check"></i>
                                    Free trial 7 days</li>
                            </ul>
                        </div>
                    </div>
                    <a href="courses.html" class="default-btn border-radius-50">Enrolled today</a>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="counter-area-three pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="counter-card box-shadow">
                    <i class="flaticon-online-course"></i>
                    <h3>
                        <span class="odometer" data-count="15000">00000</span>+</h3>
                    <p>Courses & videos</p>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="counter-card box-shadow">
                    <i class="flaticon-student"></i>
                    <h3>
                        <span class="odometer" data-count="145000">000000</span>+</h3>
                    <p>Students enrolled</p>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="counter-card box-shadow">
                    <i class="flaticon-online-course-1"></i>
                    <h3>
                        <span class="odometer" data-count="10000">00000</span>+</h3>
                    <p>Courses instructors</p>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="counter-card box-shadow">
                    <i class="flaticon-customer-satisfaction"></i>
                    <h3>
                        <span class="odometer" data-count="100">000</span>%</h3>
                    <p>Satisfaction rate</p>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="testimonials-area section-bg pt-100 pb-100">
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
                <p>“Morbi porttitor ligula id varius consectetur. Integer ipsum justo, congue sit amet massa vel, porttitor semper magna. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus.”</p>
                <div class="content">
                    <img src="assets/images/testimonials/testimonials-img1.jpg" alt="testimonials"/>
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
                <p>“Morbi porttitor ligula id varius consectetur. Integer ipsum justo, congue sit amet massa vel, porttitor semper magna. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus.”</p>
                <div class="content">
                    <img src="assets/images/testimonials/testimonials-img2.jpg" alt="testimonials"/>
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
                <p>“Morbi porttitor ligula id varius consectetur. Integer ipsum justo, congue sit amet massa vel, porttitor semper magna. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus.”</p>
                <div class="content">
                    <img src="assets/images/testimonials/testimonials-img3.jpg" alt="testimonials"/>
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
                <p>“Morbi porttitor ligula id varius consectetur. Integer ipsum justo, congue sit amet massa vel, porttitor semper magna. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus.”</p>
                <div class="content">
                    <img src="assets/images/testimonials/testimonials-img3.jpg" alt="testimonials"/>
                    <h3>Jonquil von</h3>
                    <span>Photographer</span>
                </div>
                <div class="quote">
                    <i class="flaticon-quote"></i>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="brand-area ptb-100">
    <div class="container">
        <div class="brand-slider owl-carousel owl-theme">
            <div class="brand-item">
                <img src="assets/images/brand-logo/1.png" class="brand-item-logo1" alt="Images">
                <img src="assets/images/brand-logo/brand-logo1.png" class="brand-item-logo2" alt="Images">
            </div>
            <div class="brand-item">
                <img src="assets/images/brand-logo/2.png" class="brand-item-logo1" alt="Images">
                <img src="assets/images/brand-logo/brand-logo2.png" class="brand-item-logo2" alt="Images">
            </div>
            <div class="brand-item">
                <img src="assets/images/brand-logo/3.png" class="brand-item-logo1" alt="Images">
                <img src="assets/images/brand-logo/brand-logo3.png" class="brand-item-logo2" alt="Images">
            </div>
            <div class="brand-item">
                <img src="assets/images/brand-logo/4.png" class="brand-item-logo1" alt="Images">
                <img src="assets/images/brand-logo/brand-logo4.png" class="brand-item-logo2" alt="Images">
            </div>
            <div class="brand-item">
                <img src="assets/images/brand-logo/5.png" class="brand-item-logo1" alt="Images">
                <img src="assets/images/brand-logo/brand-logo5.png" class="brand-item-logo2" alt="Images">
            </div>
            <div class="brand-item">
                <img src="assets/images/brand-logo/6.png" class="brand-item-logo1" alt="Images">
                <img src="assets/images/brand-logo/brand-logo6.png" class="brand-item-logo2" alt="Images">
            </div>
        </div>
    </div>
</div>


<div class="instructors-area pb-70">
    <div class="container">
        <div class="section-title text-center mb-45">
            <h2>Meet our top instructor</h2>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="instructors-card">
                    <a href="instructors-details.html">
                        <img src="assets/images/instructors/instructors-img1.jpg" alt="Team Images">
                    </a>
                    <div class="content">
                        <ul class="instructors-social">
                            <li class="share-btn">
                                <i class="ri-add-line"></i>
                            </li>
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
                        </ul>
                        <h3>
                            <a href="instructors-details.html">Sally welch</a>
                        </h3>
                        <span>Web designer</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="instructors-card">
                    <a href="instructors-details.html">
                        <img src="assets/images/instructors/instructors-img2.jpg" alt="Team Images">
                    </a>
                    <div class="content">
                        <ul class="instructors-social">
                            <li class="share-btn">
                                <i class="ri-add-line"></i>
                            </li>
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
                        </ul>
                        <h3>
                            <a href="instructors-details.html">Jesse joslin</a>
                        </h3>
                        <span>Content strategist</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="instructors-card">
                    <a href="instructors-details.html">
                        <img src="assets/images/instructors/instructors-img3.jpg" alt="Team Images">
                    </a>
                    <div class="content">
                        <ul class="instructors-social">
                            <li class="share-btn">
                                <i class="ri-add-line"></i>
                            </li>
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
                        </ul>
                        <h3>
                            <a href="instructors-details.html">Lance altman</a>
                        </h3>
                        <span>Photographer</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="instructors-card">
                    <a href="instructors-details.html">
                        <img src="assets/images/instructors/instructors-img4.jpg" alt="Team Images">
                    </a>
                    <div class="content">
                        <ul class="instructors-social">
                            <li class="share-btn">
                                <i class="ri-add-line"></i>
                            </li>
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
                        </ul>
                        <h3>
                            <a href="instructors-details.html">Jonquil von</a>
                        </h3>
                        <span>Art director</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="newsletter-area section-bg ptb-100">
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
                    <input type="email" class="form-control" placeholder="Enter Your Email Address" name="EMAIL" required autocomplete="off">
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