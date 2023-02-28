@extends('user.layouts.master')

@section('content')
    <main>
        <!-- slider Area Start-->
        <div class="slider-area ">
            <!-- Mobile Menu -->
            <div class="slider-active dot-style">
                <div class="single-slider  hero-overly slider-height d-flex align-items-center"
                    data-background="assets/img/hero/h1_hero.jpg">
                    <div class="container">
                        <div class="row justify-content-center text-center">
                            <div class="col-xl-9">
                                <div class="h1-slider-caption">
                                    <h1 data-animation="fadeInUp" data-delay=".4s">top hotel in the city</h1>
                                    <h3 data-animation="fadeInDown" data-delay=".4s">Hotel & Resourt</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slider  hero-overly slider-height d-flex align-items-center"
                    data-background="assets/img/hero/h1_hero.jpg">
                    <div class="container">
                        <div class="row justify-content-center text-center">
                            <div class="col-xl-9">
                                <div class="h1-slider-caption">
                                    <h1 data-animation="fadeInUp" data-delay=".4s">top hotel in the city</h1>
                                    <h3 data-animation="fadeInDown" data-delay=".4s">Hotel & Resourt</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slider  hero-overly slider-height d-flex align-items-center"
                    data-background="assets/img/hero/h1_hero.jpg">
                    <div class="container">
                        <div class="row justify-content-center text-center">
                            <div class="col-xl-9">
                                <div class="h1-slider-caption">
                                    <h1 data-animation="fadeInUp" data-delay=".4s">top hotel in the city</h1>
                                    <h3 data-animation="fadeInDown" data-delay=".4s">Hotel & Resourt</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider Area End-->

        <!-- Booking Room Start-->
        <div class="booking-area">
            <div class="container">
                <div class="row ">
                    <div class="col-12">
                        <form action="{{ route('user.booking') }}" method="POST">
                            @csrf
                            <div class="booking-wrap d-flex justify-content-between align-items-center">
                                <!-- select in date -->
                                <div class="single-select-box mb-30">
                                    <!-- select out date -->
                                    <div class="boking-tittle">
                                        <span> Check In Date:</span>
                                    </div>
                                    <div class="boking-datepicker">
                                        <input id="datepicker1" name="check_in" value="{{ old('check_in') }}" placeholder="2/3/2023" />
                                    </div>
                                    @error('check_in')
                                        <small class=" text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                @if(Auth::check())
                                    <input type="hidden" name="user_id"  value="{{ Auth::user()->id }}">
                                @endif
                                <!-- Single Select Box -->
                                <div class="single-select-box mb-30">
                                    <!-- select out date -->
                                    <div class="boking-tittle">
                                        <span>Check OutDate:</span>
                                    </div>
                                    <div class="boking-datepicker">
                                        <input id="datepicker2" name="check_out" value="{{ old('check_out') }}" placeholder="3/3/2023" />
                                    </div>
                                    @error('check_out')
                                        <small class=" text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- Single Select Box -->
                                <div class="single-select-box mb-30">
                                    <div class="boking-tittle">
                                        <span>Adults:</span>
                                    </div>
                                    <div class="select-this">
                                        <div class="select-itms">
                                            <select name="adult_people" id="select1">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                    </div>
                                    @error('adult_people')
                                        <small class=" text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- Single Select Box -->
                                <div class="single-select-box mb-30">
                                    <div class="boking-tittle">
                                        <span>Children:</span>
                                    </div>
                                    <div class="select-this">
                                        <div class="select-itms">
                                            <select name="child_people" id="select2">
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                    </div>
                                    @error('child_people')
                                        <small class=" text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- Single Select Box -->
                                <div class="single-select-box mb-30">
                                    <div class="boking-tittle">
                                        <span>Rooms:</span>
                                    </div>
                                    <div class="select-this">
                                        <div class="select-itms">
                                            <select name="room_amount" id="select3">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                    </div>
                                    @error('room_amount')
                                        <small class=" text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Single Select Box -->
                                <div class="single-select-box pt-45 mb-30">
                                    <button type="submit" class="btn select-btn">Book Now</button>
                                </div>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Booking Room End-->

        <!-- Make customer Start-->
        <section class="make-customer-area customar-padding fix">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-xl-5 col-lg-6">
                        <div class="customer-img mb-120">
                            <img src="assets/img/customer/customar1.png" class="customar-img1" alt="">
                            <img src="assets/img/customer/customar2.png" class="customar-img2" alt="">
                            <div class="service-experience heartbeat">
                                <h3>25 Years of Service<br>Experience</h3>
                            </div>
                        </div>
                    </div>
                    <div class=" col-xl-4 col-lg-4">
                        <div class="customer-caption">
                            <span>About our company</span>
                            <h2>Make the customer the hero of your story</h2>
                            <div class="caption-details">
                                <p class="pera-dtails">Lorem ipsum dolor sit amet, consectetur adipisic- ing elit, sed do
                                    eiusmod tempor inc. </p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud. </p>
                                <a href="#" class="btn more-btn1">Learn More <i class="ti-angle-right"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Make customer End-->

        <!-- Room Start -->
        <section class="room-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8">
                        <!--font-back-tittle  -->
                        <div class="font-back-tittle mb-45">
                            <div class="archivment-front">
                                <h3>Our Rooms</h3>
                            </div>
                            <h3 class="archivment-back">Our Rooms</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($roomTypes as  $roomType)
                        <!-- Single Room -->
                        <div class="col-xl-4 col-lg-6 col-md-6">

                            <div class="single-room mb-50">
                                <div class="room-img">
                                    <a href="rooms.html"><img src="{{ asset('storage/img/roomTypes/'. $roomType->image) }}" alt=""></a>
                                </div>
                                <div class="room-caption">
                                    <h3><a href="{{ route('detail.rooms', $roomType->id) }}">{{ $roomType->name }}</a></h3>
                                    <div class="per-night">
                                        <span><u>$</u>{{ $roomType->price_per_night }} <span>/ per night</span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row justify-content-center">
                    <div class="room-btn pt-70">
                        <a href="{{ route('user.rooms') }}" class="btn view-btn1">View more <i class="ti-angle-right"></i> </a>
                    </div>
                </div>
            </div>

        </section>
        <!-- Room End -->

        <!-- Dining Start -->
        <div class="dining-area dining-padding-top">
            <!-- Single Left img -->
            <div class="single-dining-area left-img">
                <div class="container">
                    <div class="row justify-content-end">
                        <div class="col-lg-8 col-md-8">
                            <div class="dining-caption">
                                <span>Our resturent</span>
                                <h3>Dining & Drinks</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br> tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim <br>veniam, quis nostrud.
                                </p>
                                <a href="#" class="btn border-btn">Learn More <i class="ti-angle-right"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- single Right img -->
            <div class="single-dining-area right-img">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-lg-8 col-md-8">
                            <div class="dining-caption text-right">
                                <span>Our Pool</span>
                                <h3>Swimming Pool</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br> tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim <br>veniam, quis nostrud.
                                </p>
                                <a href="#" class="btn border-btn">Learn More <i class="ti-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Dining End -->

        <!-- Testimonial Start -->
        <div class="testimonial-area testimonial-padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-9 col-lg-9 col-md-9">
                        <div class="h1-testimonial-active">
                            <!-- Single Testimonial -->
                            <div class="single-testimonial pt-65">
                                <!-- Testimonial tittle -->
                                <div class="font-back-tittle mb-105">
                                    <div class="archivment-front">
                                        <img src="assets/img/logo/testimonial.png" alt="">
                                    </div>
                                    <h3 class="archivment-back">Testimonial</h3>
                                </div>
                                <!-- Testimonial Content -->
                                <div class="testimonial-caption text-center">
                                    <p>Yorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris nisi.
                                    </p>
                                    <!-- Rattion -->
                                    <div class="testimonial-ratting">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="rattiong-caption">
                                        <span>Clifford Frazier, <span>Regular Client</span> </span>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Testimonial -->
                            <div class="single-testimonial  pt-65">
                                <!-- Testimonial tittle -->
                                <div class="font-back-tittle mb-105">
                                    <div class="archivment-front">
                                        <img src="assets/img/logo/testimonial.png" alt="">
                                    </div>
                                    <h3 class="archivment-back">Testimonial</h3>
                                </div>
                                <!-- Testimonial Content -->
                                <div class="testimonial-caption text-center">
                                    <p>Yorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris nisi.
                                    </p>
                                    <div class="testimonial-ratting">
                                        <a href="#"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                    </div>
                                    <div class="rattiong-caption">
                                        <span>Clifford Frazier, <span>Regular Client</span> </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->

        <!-- Blog Start -->
        <div class="blog-area blog-padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8">
                        <!-- Seciton Tittle  -->
                        <div class="font-back-tittle mb-50">
                            <div class="archivment-front">
                                <h3>Our Blog</h3>
                            </div>
                            <h3 class="archivment-back">Recent News</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <!-- Single Blog -->
                        <div class="single-blog mb-30">
                            <div class="blog-img">
                                <a href="single-blog.html"><img src="assets/img/our_blog/blog-img1.jpg"
                                        alt=""></a>
                            </div>
                            <div class="blog-caption">
                                <div class="blog-cap-top d-flex justify-content-between mb-40">
                                    <span>news</span>
                                    <ul>
                                        <li>by<a href="#"> Jhon Guru</a></li>
                                    </ul>
                                </div>
                                <div class="blog-cap-mid">
                                    <p><a href="single-blog.html">5 Simple Tricks for Getting Stellar Hotel Service
                                            Wherever You Are</a></p>
                                </div>
                                <!-- Comments -->
                                <div class="blog-cap-bottom d-flex justify-content-between">
                                    <span>Feb 28, 2020</span>
                                    <span><img src="assets/img/our_blog/blog-comments-icon.jpg" alt="">3</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <!-- Single Blog -->
                        <div class="single-blog mb-30">
                            <div class="blog-img">
                                <a href="single-blog.html"> <img src="assets/img/our_blog/blog-img2.jpg"
                                        alt=""></a>
                            </div>
                            <div class="blog-caption">
                                <div class="blog-cap-top d-flex justify-content-between mb-40">
                                    <span>news</span>
                                    <ul>
                                        <li>by<a href="#"> Jhon Guru</a></li>
                                    </ul>
                                </div>
                                <div class="blog-cap-mid">
                                    <p><a href="single-blog.html">5 Simple Tricks for Getting Stellar Hotel Service
                                            Wherever You Are</a></p>
                                </div>
                                <!-- Comments -->
                                <div class="blog-cap-bottom d-flex justify-content-between">
                                    <span>Feb 28, 2020</span>
                                    <span><img src="assets/img/our_blog/blog-comments-icon.jpg" alt="">3</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <!-- Single Blog -->
                        <div class="single-blog mb-30">
                            <div class="blog-img">
                                <a href="single-blog.html"><img src="assets/img/our_blog/blog-img3.jpg"
                                        alt=""></a>
                            </div>
                            <div class="blog-caption">
                                <div class="blog-cap-top d-flex justify-content-between mb-40">
                                    <span>news</span>
                                    <ul>
                                        <li>by<a href="#"> Jhon Guru</a></li>
                                    </ul>
                                </div>
                                <div class="blog-cap-mid">
                                    <p><a href="single-blog.html">5 Simple Tricks for Getting Stellar Hotel Service
                                            Wherever You Are</a></p>
                                </div>
                                <!-- Comments -->
                                <div class="blog-cap-bottom d-flex justify-content-between">
                                    <span>Feb 28, 2020</span>
                                    <span><img src="assets/img/our_blog/blog-comments-icon.jpg" alt="">3</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Blog End -->

        <!-- Gallery img Start-->
        <div class="gallery-area fix">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-md-12">
                        <div class="gallery-active owl-carousel">
                            <div class="gallery-img">
                                <a href="#"><img src="assets/img/gallery/gallery1.jpg" alt=""></a>
                            </div>
                            <div class="gallery-img">
                                <a href="#"><img src="assets/img/gallery/gallery2.jpg" alt=""></a>
                            </div>
                            <div class="gallery-img">
                                <a href="#"><img src="assets/img/gallery/gallery3.jpg" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Gallery img End-->
    </main>
@endsection
