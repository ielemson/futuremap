@extends('layouts.front')

@section('content')

@section('title', 'Home')  

@include('front.include.banner')

<div class="counter-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-6 col-md-3">
                <div class="counter-content">
                    <i class="flaticon-online-course"></i>
                    <h3>
                        <span class="odometer" data-count="15000">00000</span>+</h3>
                    <p>Courses & videos</p>
                </div>
            </div>
            <div class="col-lg-3 col-6 col-md-3">
                <div class="counter-content">
                    <i class="flaticon-student"></i>
                    <h3>
                        <span class="odometer" data-count="145000">000000</span>+</h3>
                    <p>Students enrolled</p>
                </div>
            </div>
            <div class="col-lg-3 col-6 col-md-3">
                <div class="counter-content">
                    <i class="flaticon-online-course-1"></i>
                    <h3>
                        <span class="odometer" data-count="10000">00000</span>+</h3>
                    <p>Courses instructors</p>
                </div>
            </div>
            <div class="col-lg-3 col-6 col-md-3">
                <div class="counter-content">
                    <i class="flaticon-customer-satisfaction"></i>
                    <h3>
                        <span class="odometer" data-count="100">000</span>%</h3>
                    <p>Satisfaction rate</p>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="featured-area pt-100 pb-70">
    <div class="container">
        <div class="row align-items-center mb-45">
            <div class="col-lg-8 col-md-9">
                <div class="section-title mt-rs-20">
                    <h2>Explore top featured categories</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-3 text-end">
                <a href="courses.html" class="default-btn">Explore more</a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-6 col-md-4">
                <div class="featured-card">
                    <a href="courses.html">
                        <i class="flaticon-web-development"></i>
                        <h3>Development</h3>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-6 col-md-4">
                <div class="featured-card">
                    <a href="courses.html">
                        <i class="flaticon-design"></i>
                        <h3>Web designing</h3>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-6 col-md-4">
                <div class="featured-card">
                    <a href="courses.html">
                        <i class="flaticon-wellness"></i>
                        <h3>Lifestyle</h3>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-6 col-md-4">
                <div class="featured-card">
                    <a href="courses.html">
                        <i class="flaticon-heart-beat"></i>
                        <h3>Health & fitness</h3>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-6 col-md-4">
                <div class="featured-card">
                    <a href="courses.html">
                        <i class="flaticon-corporate"></i>
                        <h3>Gov. exams</h3>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-6 col-md-4">
                <div class="featured-card">
                    <a href="courses.html">
                        <i class="flaticon-camera"></i>
                        <h3>Photography</h3>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-6 col-md-4">
                <div class="featured-card">
                    <a href="courses.html">
                        <i class="flaticon-user"></i>
                        <h3>Accounting</h3>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-6 col-md-4">
                <div class="featured-card">
                    <a href="courses.html">
                        <i class="flaticon-folder"></i>
                        <h3>Data science</h3>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="courses-area pb-70">
    <div class="container">
        <div class="section-title text-center mb-45">
            <h2>Find popular courses</h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                labore et dolore magna aliqua. Ut enim ad minim veniam.
            </p>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="courses-item">
                    <a href="courses-details.html">
                        <img src="assets/images/courses/courses-img1.jpg" alt="Courses"/>
                    </a>
                    <div class="content">
                        <a href="courses.html" class="tag-btn">Design</a>
                        <div class="price-text">$120</div>
                        <h3>
                            <a href="courses-details.html">UI/UX design pattern for succesfull software applications</a>
                        </h3>
                        <ul class="course-list">
                            <li>
                                <i class="ri-time-fill"></i>
                                10 hr 07 min</li>
                            <li>
                                <i class="ri-vidicon-fill"></i>
                                67 lectures</li>
                        </ul>
                        <div class="bottom-content">
                            <a href="instructors-details.html" class="user-area">
                                <img src="assets/images/courses/courses-instructors1.jpg" alt="Instructors">
                                <h3>David warner</h3>
                            </a>
                            <div class="rating">
                                <i class="ri-star-fill"></i>4k+ rating
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="courses-item">
                    <a href="courses-details.html">
                        <img src="assets/images/courses/courses-img2.jpg" alt="Courses"/>
                    </a>
                    <div class="content">
                        <a href="courses.html" class="tag-btn">Accounting</a>
                        <div class="price-text">$129</div>
                        <h3>
                            <a href="courses-details.html">Basic knowledge about hodiernal bharat in history</a>
                        </h3>
                        <ul class="course-list">
                            <li>
                                <i class="ri-time-fill"></i>
                                04 hr 07 min</li>
                            <li>
                                <i class="ri-vidicon-fill"></i>
                                27 lectures</li>
                        </ul>
                        <div class="bottom-content">
                            <a href="instructors-details.html" class="user-area">
                                <img src="assets/images/courses/courses-instructors2.jpg" alt="Instructors">
                                <h3>David malan</h3>
                            </a>
                            <div class="rating">
                                <i class="ri-star-fill"></i>2k+ rating
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="courses-item">
                    <a href="courses-details.html">
                        <img src="assets/images/courses/courses-img3.jpg" alt="Courses"/>
                    </a>
                    <div class="content">
                        <a href="courses.html" class="tag-btn">Physics</a>
                        <div class="price-text">$100</div>
                        <h3>
                            <a href="courses-details.html">Visual effects for games in unity beginner to intermediate</a>
                        </h3>
                        <ul class="course-list">
                            <li>
                                <i class="ri-time-fill"></i>
                                02 hr 00 min</li>
                            <li>
                                <i class="ri-vidicon-fill"></i>
                                17 lectures</li>
                        </ul>
                        <div class="bottom-content">
                            <a href="instructors-details.html" class="user-area">
                                <img src="assets/images/courses/courses-instructors3.jpg" alt="Instructors">
                                <h3>Emma jhonson</h3>
                            </a>
                            <div class="rating">
                                <i class="ri-star-fill"></i>1k+ rating
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="courses-item">
                    <a href="courses-details.html">
                        <img src="assets/images/courses/courses-img4.jpg" alt="Courses"/>
                    </a>
                    <div class="content">
                        <a href="courses.html" class="tag-btn">Business</a>
                        <div class="price-text">$140</div>
                        <h3>
                            <a href="courses-details.html">The complete accounting & bank financial course 2021</a>
                        </h3>
                        <ul class="course-list">
                            <li>
                                <i class="ri-time-fill"></i>
                                04 hr 00 min</li>
                            <li>
                                <i class="ri-vidicon-fill"></i>
                                07 lectures</li>
                        </ul>
                        <div class="bottom-content">
                            <a href="instructors-details.html" class="user-area">
                                <img src="assets/images/courses/courses-instructors4.jpg" alt="Instructors">
                                <h3>Jesse joslin</h3>
                            </a>
                            <div class="rating">
                                <i class="ri-star-fill"></i>7k+ rating
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="courses-item">
                    <a href="courses-details.html">
                        <img src="assets/images/courses/courses-img5.jpg" alt="Courses"/>
                    </a>
                    <div class="content">
                        <a href="courses.html" class="tag-btn">Finance</a>
                        <div class="price-text">$159</div>
                        <h3>
                            <a href="courses-details.html">The complete business plan course includes 50 templates</a>
                        </h3>
                        <ul class="course-list">
                            <li>
                                <i class="ri-time-fill"></i>
                                03 hr 00 min</li>
                            <li>
                                <i class="ri-vidicon-fill"></i>
                                17 lectures</li>
                        </ul>
                        <div class="bottom-content">
                            <a href="instructors-details.html" class="user-area">
                                <img src="assets/images/courses/courses-instructors5.jpg" alt="Instructors">
                                <h3>Lance altman</h3>
                            </a>
                            <div class="rating">
                                <i class="ri-star-fill"></i>5k+ rating
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="courses-item">
                    <a href="courses-details.html">
                        <img src="assets/images/courses/courses-img6.jpg" alt="Courses"/>
                    </a>
                    <div class="content">
                        <a href="courses.html" class="tag-btn">Banking</a>
                        <div class="price-text">$200</div>
                        <h3>
                            <a href="courses-details.html">Full web designing course with 20 web template designing</a>
                        </h3>
                        <ul class="course-list">
                            <li>
                                <i class="ri-time-fill"></i>
                                06 hr 00 min</li>
                            <li>
                                <i class="ri-vidicon-fill"></i>
                                10 lectures</li>
                        </ul>
                        <div class="bottom-content">
                            <a href="instructors-details.html" class="user-area">
                                <img src="assets/images/courses/courses-instructors6.jpg" alt="Instructors">
                                <h3>Altman lucas
                                </h3>
                            </a>
                            <div class="rating">
                                <i class="ri-star-fill"></i>3k+ rating
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="play-area ptb-100">
    <div class="container">
        <div class="title text-center mb-45">
            <h2>
                We worked with
                <span>250+
                </span>
                leading universities and companies</h2>
        </div>
        <div class="brand-slider owl-carousel owl-theme pb-100">
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
        <div class="play-btn-area">
            <a href="https://www.youtube.com/watch?v=Zd00oIDAt60" class="play-btn">
                <i class='flaticon-play-button-arrowhead'></i>
            </a>
        </div>
    </div>
</div>


<div class="instructors-area pb-70">
    <div class="container">
        <div class="row align-items-center mb-45">
            <div class="col-lg-8 col-md-9">
                <div class="section-title mt-rs-20">
                    <h2>Meet our top instructor</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-3 text-end">
                <a href="instructors.html" class="default-btn">View all instructor</a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6">
                <div class="instructors-item">
                    <div class="instructors-img">
                        <a href="instructors-details.html">
                            <img src="assets/images/instructors/instructors-img1.jpg" alt="Team Images">
                        </a>
                        <ul class="instructors-social">
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
                    </div>
                    <div class="content">
                        <h3>
                            <a href="instructors-details.html">Sally welch</a>
                        </h3>
                        <span>Web designer</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="instructors-item">
                    <div class="instructors-img">
                        <a href="instructors-details.html">
                            <img src="assets/images/instructors/instructors-img2.jpg" alt="Team Images">
                        </a>
                        <ul class="instructors-social">
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
                    </div>
                    <div class="content">
                        <h3>
                            <a href="instructors-details.html">Jesse joslin</a>
                        </h3>
                        <span>Content strategist</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="instructors-item">
                    <div class="instructors-img">
                        <a href="instructors-details.html">
                            <img src="assets/images/instructors/instructors-img3.jpg" alt="Team Images">
                        </a>
                        <ul class="instructors-social">
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
                    </div>
                    <div class="content">
                        <h3>
                            <a href="instructors-details.html">Lance altman</a>
                        </h3>
                        <span>Photographer</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="instructors-item">
                    <div class="instructors-img">
                        <a href="instructors-details.html">
                            <img src="assets/images/instructors/instructors-img4.jpg" alt="Team Images">
                        </a>
                        <ul class="instructors-social">
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
                    </div>
                    <div class="content">
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


<div class="testimonials-area pb-100">
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
                <img src="assets/images/testimonials/testimonials-img1.jpg" alt="testimonials"/>
                <div class="rating">
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                </div>
                <p>“Morbi porttitor ligula id varius consectetur. Integer ipsum justo, congue sit amet massa vel, porttitor semper magna. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus.”</p>
                <h3>Nikolas brooten</h3>
                <span>Student</span>
                <div class="quote">
                    <i class="flaticon-quote"></i>
                </div>
            </div>
            <div class="testimonials-item">
                <img src="assets/images/testimonials/testimonials-img2.jpg" alt="testimonials"/>
                <div class="rating">
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                </div>
                <p>“Morbi porttitor ligula id varius consectetur. Integer ipsum justo, congue sit amet massa vel, porttitor semper magna. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus.”</p>
                <h3>Terry ambady</h3>
                <span>Content strategist</span>
                <div class="quote">
                    <i class="flaticon-quote"></i>
                </div>
            </div>
            <div class="testimonials-item">
                <img src="assets/images/testimonials/testimonials-img3.jpg" alt="testimonials"/>
                <div class="rating">
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                </div>
                <p>“Morbi porttitor ligula id varius consectetur. Integer ipsum justo, congue sit amet massa vel, porttitor semper magna. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus.”</p>
                <h3>Cory zamora</h3>
                <span>Photographer</span>
                <div class="quote">
                    <i class="flaticon-quote"></i>
                </div>
            </div>
            <div class="testimonials-item">
                <img src="assets/images/testimonials/testimonials-img4.jpg" alt="testimonials"/>
                <div class="rating">
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                </div>
                <p>“Morbi porttitor ligula id varius consectetur. Integer ipsum justo, congue sit amet massa vel, porttitor semper magna. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus.”</p>
                <h3>Jonquil von</h3>
                <span>Photographer</span>
                <div class="quote">
                    <i class="flaticon-quote"></i>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="enrolled-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="enrolled-content">
                    <div class="section-title">
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
                    <a href="courses.html" class="default-btn">Enrolled today</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="enrolled-img" data-speed="0.05" data-revert="true">
                    <img src="assets/images/enrolled/enrolled-img.png" alt="Enrolled"/>
                    <div class="bg-shape">
                        <img src="assets/images/enrolled/enrolled-shape.png" alt="Shape"/>
                    </div>
                    <div class="top-content">
                        <div class="enrolled-img-content">
                            <i class="flaticon-mail-inbox-app"></i>
                            <div class="content">
                                <h3>Inbox</h3>
                                <p>Work with us!</p>
                            </div>
                        </div>
                    </div>
                    <div class="right-content">
                        <div class="enrolled-img-content">
                            <i class="flaticon-discount"></i>
                            <div class="content">
                                <h3>Get 40% off</h3>
                                <p>Every course</p>
                            </div>
                        </div>
                    </div>
                    <div class="left-content">
                        <div class="enrolled-img-content">
                            <i class="flaticon-reading-book active"></i>
                            <div class="content">
                                <h3>110k+ students</h3>
                                <p>Learn daily</p>
                            </div>
                        </div>
                    </div>
                    <div class="enrolled-img-shape">
                        <div class="shape1">
                            <img src="assets/images/enrolled/enrolled-shape2.png" alt="Shape"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="blog-area pt-100 pb-70">
    <div class="container">
        <div class="row align-items-center mb-45">
            <div class="col-lg-8 col-md-9">
                <div class="section-title mt-rs-20">
                    <h2>Latest from our blogs</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.
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
                            <a href="single-blog-1.html">Here are the things to look for when selecting an online course</a>
                        </h3>
                        <p>Lorem ipsum dolor sit amet, constetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                        <a href="single-blog-1.html" class="read-btn">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection