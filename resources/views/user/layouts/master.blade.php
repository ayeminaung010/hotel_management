<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>@yield('title')</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="manifest" href="site.webmanifest">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('user/assets/img/favicon.ico') }}">

        <!-- CSS here -->
        <link rel="stylesheet" href="{{ asset('user/assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('user/assets/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{ asset('user/assets/css/gijgo.css')}}">
        <link rel="stylesheet" href="{{ asset('user/assets/css/slicknav.css')}}">
        <link rel="stylesheet" href="{{ asset('user/assets/css/animate.min.css')}}">
        <link rel="stylesheet" href="{{ asset('user/assets/css/magnific-popup.css')}}">
        <link rel="stylesheet" href="{{ asset('user/assets/css/fontawesome-all.min.css')}}">
        <link rel="stylesheet" href="{{ asset('user/assets/css/themify-icons.css')}}">
        <link rel="stylesheet" href="{{ asset('user/assets/css/slick.css')}}">
        <link rel="stylesheet" href="{{ asset('user/assets/css/nice-select.css')}}">
        <link rel="stylesheet" href="{{ asset('user/assets/css/style.css')}}">
        <link rel="stylesheet" href="{{ asset('user/assets/css/responsive.css')}}">
   </head>

   <body>
        <!-- Preloader Start -->
        <div id="preloader-active">
            <div class="preloader d-flex align-items-center justify-content-center">
                <div class="preloader-inner position-relative">
                    <div class="preloader-circle"></div>
                    <div class="preloader-img pere-text">
                        <strong>Hotel</b>
                    </div>
                </div>
            </div>
        </div>
        <!-- Preloader Start -->

        <header>
            <!-- Header Start -->
           <div class="header-area header-sticky">
                <div class="main-header ">
                    <div class="container">
                        <div class="row align-items-center">
                            <!-- logo -->
                            <div class="col-xl-2 col-lg-2">
                                <div class="logo">
                                   <a href="{{ route('user.home') }}"><img src="{{ asset('user/assets/img/logo/logo.png') }}" alt=""></a>
                                </div>
                            </div>
                        <div class="col-xl-8 col-lg-8">
                                <!-- main-menu -->
                                <div class="main-menu f-right d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a class=" text-decoration-none" href="{{ route('user.home') }}">Home</a></li>
                                            <li><a class=" text-decoration-none" href="{{ route('user.about') }}">About</a></li>
                                            <li><a class=" text-decoration-none" href="{{ route('user.service') }}">Service</a></li>
                                            <li><a class=" text-decoration-none" href="#">Pages</a>
                                                <ul class="submenu">
                                                    <li><a class=" text-decoration-none" href="{{ route('user.rooms') }}">Rooms</a>
                                                </ul>
                                            </li>
                                            <li><a class=" text-decoration-none" href="{{ route('user.contact') }}">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2">
                                <!-- header-btn -->
                                @if (Auth::check())
                                    @if (Auth::user()->role == 'user')
                                        <div class="header-btn">
                                            <!-- Example single danger button -->
                                            <div class="btn-group">
                                            <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                {{ Auth::user()->name }}
                                            </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#">Profile</a></li>
                                                    <li><a class="dropdown-item" href="#">Password Change</a></li>
                                                    <li><hr class="dropdown-divider"></li>
                                                    <li>
                                                        <form action="{{ route('logout.user') }}" method="POST">
                                                            @csrf
                                                            <button class="dropdown-item" >Logout</button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    @else
                                        <div class="header-btn">
                                            <a href="{{ url('/login') }}" class="btn btn1 d-none d-lg-block ">Login </a>
                                        </div>
                                    @endif
                                @else
                                    <div class="header-btn">
                                        <a href="{{ url('/login') }}" class="btn btn1 d-none d-lg-block ">Login</a>
                                    </div>
                                @endif
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
            <!-- Header End -->
        </header>
        @yield('content')
       <footer>
           <!-- Footer Start-->
           <div class="footer-area black-bg footer-padding">
               <div class="container">
                   <div class="row d-flex justify-content-between">
                       <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                          <div class="single-footer-caption mb-30">
                             <!-- logo -->
                             <div class="footer-logo">
                               <a href="index.html"><img src="assets/img/logo/logo2_footer.png" alt=""></a>
                             </div>
                             <div class="footer-social footer-social2">
                                 <a href="#"><i class="fab fa-facebook-f"></i></a>
                                 <a href="#"><i class="fab fa-twitter"></i></a>
                                 <a href="#"><i class="fas fa-globe"></i></a>
                                 <a href="#"><i class="fab fa-behance"></i></a>
                             </div>
                             <div class="footer-pera">
                                  <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
      Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
      <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                             </div>
                          </div>
                       </div>
                       <div class="col-xl-3 col-lg-3 col-md-3 col-sm-5">
                           <div class="single-footer-caption mb-30">
                               <div class="footer-tittle">
                                   <h4>Quick Links</h4>
                                   <ul>
                                       <li><a href="#">About Mariana</a></li>
                                       <li><a href="#">Our Best Rooms</a></li>
                                       <li><a href="#">Our Photo Gellary</a></li>
                                       <li><a href="#">Pool Service</a></li>
                                   </ul>
                               </div>
                           </div>
                       </div>
                       <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                           <div class="single-footer-caption mb-30">
                               <div class="footer-tittle">
                                   <h4>Reservations</h4>
                                   <ul>
                                       <li><a href="#">Tel: 345 5667 889</a></li>
                                       <li><a href="#">Skype: Marianabooking</a></li>
                                       <li><a href="#">reservations@hotelriver.com</a></li>
                                   </ul>
                               </div>
                           </div>
                       </div>
                       <div class="col-xl-3 col-lg-3 col-md-4  col-sm-5">
                           <div class="single-footer-caption mb-30">
                               <div class="footer-tittle">
                                   <h4>Our Location</h4>
                                   <ul>
                                       <li><a href="#">198 West 21th Street,</a></li>
                                       <li><a href="#">Suite 721 New York NY 10016</a></li>
                                   </ul>
                                   <!-- Form -->
                                    <div class="footer-form" >
                                        <div id="mc_embed_signup">
                                            <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                            method="get" class="subscribe_form relative mail_part">
                                                <input type="email" name="email" id="newsletter-form-email" placeholder="Email Address"
                                                class="placeholder hide-on-focus" onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = ' Email Address '">
                                                <div class="form-icon">
                                                  <button type="submit" name="submit" id="newsletter-submit"
                                                  class="email_icon newsletter-submit button-contactForm"><img src="assets/img/logo/form-iocn.jpg" alt=""></button>
                                                </div>
                                                <div class="mt-10 info"></div>
                                            </form>
                                        </div>
                                    </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <!-- Footer End-->
       </footer>





    <!-- JS here -->
        <!-- All JS Custom Plugins Link Here here -->
        <script src="{{ asset('user/assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>

        <!-- Jquery, Popper, Bootstrap -->
        <script src="{{ asset('user/assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
        <script src="{{ asset('user/assets/js/popper.min.js')}}"></script>
        <script src="{{ asset('user/assets/js/bootstrap.min.js')}}"></script>
        <!-- Jquery Mobile Menu -->
        <script src="{{ asset('user/assets/js/jquery.slicknav.min.js')}}"></script>

        <!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="{{ asset('user/assets/js/owl.carousel.min.js')}}"></script>
        <script src="{{ asset('user/assets/js/slick.min.js')}}"></script>
        <!-- Date Picker -->
        <script src="{{ asset('user/assets/js/gijgo.min.js')}}"></script>
        <!-- One Page, Animated-HeadLin -->
        <script src="{{ asset('user/assets/js/wow.min.js')}}"></script>
        <script src="{{ asset('user/assets/js/animated.headline.js')}}"></script>
        <script src="{{ asset('user/assets/js/jquery.magnific-popup.js')}}"></script>

        <!-- Scrollup, nice-select, sticky -->
        <script src="{{ asset('user/assets/js/jquery.scrollUp.min.js')}}"></script>
        <script src="{{ asset('user/assets/js/jquery.nice-select.min.js')}}"></script>
        <script src="{{ asset('user/assets/js/jquery.sticky.js')}}"></script>

        <!-- contact js -->
        <script src="{{ asset('user/assets/js/contact.js')}}"></script>
        <script src="{{ asset('user/assets/js/jquery.form.js')}}"></script>
        <script src="{{ asset('user/assets/js/jquery.validate.min.js')}}"></script>
        {{-- <script src="{{ asset('user/assets/js/mail-script.js')}}"></script> --}}
        <script src="{{ asset('user/assets/js/jquery.ajaxchimp.min.js')}}"></script>

        <!-- Jquery Plugins, main Jquery -->
        <script src="{{ asset('user/assets/js/plugins.js')}}"></script>
        <script src="{{ asset('user/assets/js/main.js')}}"></script>

    </body>
</html>
