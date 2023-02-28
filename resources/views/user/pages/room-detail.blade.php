@extends('user.layouts.master')

@section('content')
<main>

    <!-- slider Area Start-->
    <div class="slider-area">
        <div class="single-slider hero-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/roomspage_hero.jpg" >
            <div class="container">
                <div class="row ">
                    <div class="col-md-11 offset-xl-1 offset-lg-1 offset-md-1">
                        <div class="hero-caption">
                            <span>Rooms</span>
                            <h2>Our Room Details</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->

    <!-- Room Start -->
    <section class="room-area r-padding1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <!--font-back-tittle  -->
                    <div class="font-back-tittle mb-45">
                        <h3 class="archivment-back user-select-none">Our Rooms Details</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <!-- Single Room -->
                    <div class="single-room mb-50">
                        <div class="room-img">
                            <a href="rooms.html"><img src="{{ asset('storage/img/roomTypes/'. $roomType->image) }}" alt=""></a>
                        </div>
                        <div class="room-caption">
                            <h3>{{ $roomType->name }}</h3>
                            <div class="per-night">
                                <span><u>$</u>{{ $roomType->price_per_night }} <span>/ per night</span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-8 col-md-6">
                    <p>
                        {{ $roomType->description }}
                    </p>
                    <div class=" mt-5">
                        <form action="{{ route('booking.detail.rooms') }}" method="POST">
                            @csrf
                            <div class="booking-wrap d-flex flex-wrap justify-content-between align-items-center">
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
                                    <input type="hidden" name="room_id"  value="{{ $roomType->id }}">
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

    </section>
    <!-- Room End -->

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
