<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="KOOKO">
    <meta name="keywords" content="au theme template">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Title Page-->
    <title>Hotel Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <!-- Fontfaces CSS-->
    <link href="{{ asset('admin/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="{{ asset('admin/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('admin/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- Vendor CSS-->
    <link href="{{ asset('admin/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/vector-map/jqvmap.min.css') }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('admin/css/theme.css') }}" rel="stylesheet" media="all">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>

        window.onload=function(){
            const audio = document.querySelector('audio');

            const userId = document.querySelector('#userId');
            const notiCheck = document.querySelector('#noti-check');
            notiCheck.addEventListener('change',function(){
                const notiCheckValue =  notiCheck.checked;
                console.log(notiCheckValue);
                const data = {
                    notiCheckStatus : notiCheckValue
                }
                axios.get('/admin/notification', {
                    params : data
                })
                .then(function(response) {
                    console.log(response.data);

                })
                .catch(function(error) {
                    console.log(error);
                })
            })

            window.Echo.private('booking-message')
            .listen('BookingMessage', (e) => {
                Toastify({
                  text: e.message,
                  duration: 3000,
                  destination: "https://github.com/apvarun/toastify-js",
                  newWindow: true,
                  close: true,
                  gravity: "top",
                  position: "right",
                  stopOnFocus: true,
                  style: {
                    background: "linear-gradient(to right, #00b09b, #96c93d)",
                  },
                  onClick: function(){}
                }).showToast();
                if(notiCheck.checked === true){
                    audio.play();
                }
            });

            window.Echo.private('App.Models.User.' + userId.value)
            .notification((notification) => {
                const noti = JSON.parse(notification.message);
                Toastify({
                  text: "New Contact Message Received...",
                  duration: 3000,
                  destination: "https://github.com/apvarun/toastify-js",
                  newWindow: true,
                  close: true,
                  gravity: "top",
                  position: "right",
                  stopOnFocus: true,
                  style: {
                    background: "linear-gradient(to right, #00b09b, #96c93d)",
                  },
                  onClick: function(){}
                }).showToast();
                
                if(notiCheck.checked === true){
                    audio.play();
                }

                const notiContainer = document.querySelector('#notiContainer');
                let data = '';
                data += `
                    <div class="notifi__item">
                        <div class="bg-c1 img-cir img-40">
                            <i class="zmdi zmdi-email-open"></i>
                        </div>
                        <div class="content">
                            <div class=" d-flex flex-column gap-2">
                                <p>${noti.name}</p>
                                <span class="text-black-50">${noti.subject}</span>
                            </div>
                            <div class=" d-flex justify-content-between">
                                <span class="date">${noti.created_at}</span>
                                <span class="date">${noti.created_at}</span>
                            </div>
                        </div>
                    </div>
                `;
                notiContainer.innerHTML  = data;
            });

        }
    </script>
</head>

<body class="animsition">
    <div class="page-wrapper">
         <!-- MENU SIDEBAR-->
         <aside class="menu-sidebar2">
            <div class="logo">
                <a href="#">
                    <img src="{{ asset('admin/images/icon/logo-white.png') }}" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                    <input type="hidden" name="userId" id="userId" value="{{ Auth::user()->id }}">
                    <div class="image img-cir img-120">
                        {{-- <img src="{{ asset('admin/images/icon/avatar-big-01.jpg') }}" alt="John Doe" /> --}}
                        @if (Auth::user()->avatar === null)
                            <img src="{{ asset('img/profile/Profile.png') }}" class="" alt="">
                        @else
                            <img src="{{ asset('storage/img/profile/'. Auth::user()->avatar) }}" class="" alt="">
                        @endif
                    </div>
                    <h4 class="name">{{ auth()->user()->name }}</h4>
                    <form action="{{ route('logout.user') }}" method="POST">
                        @csrf
                        <button type="submit" class=" btn btn-outline-dark">Sign out</button>
                    </form>

                </div>
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li class="@if( Route::currentRouteName() === 'admin.dashboard' ) active @endif has-sub">
                            <a class="js-arrow text-decoration-none" href="{{ route('admin.dashboard') }}">
                                <i class="fa-regular fa-folder "></i>Dashboard
                            </a>

                        </li>
                        <li class="@if( Route::currentRouteName() === 'admin.reservation' ) active @endif has-sub">
                            <a class="js-arrow text-decoration-none" href="{{ route('admin.reservation') }}">
                                <i class="fa-solid fa-calendar-days"></i>Reversation
                            </a>

                        </li>
                        <li class="@if( Route::currentRouteName() === 'admin.rooms' ) active @endif has-sub">
                            <a class="js-arrow text-decoration-none" href="{{ route('admin.rooms') }}">
                                <i class="fa-solid fa-hotel"></i>Manage Rooms
                            </a>
                        </li>
                        <li class="@if( Route::currentRouteName() === 'index.roomType' ) active @endif has-sub">
                            <a class="js-arrow text-decoration-none" href="{{ route('index.roomType') }}">
                                <i class="fa-solid fa-list-ol"></i>Manage Room Types
                            </a>
                        </li>
                        <li class="@if( Route::currentRouteName() === 'admin.staff' ) active @endif has-sub">
                            <a class="js-arrow text-decoration-none" href="{{ route('admin.staff') }}">
                                <i class="fa-solid fa-people-roof"></i>Manage Staffs
                            </a>

                        </li>
                        <li class="@if( Route::currentRouteName() === 'online.booking' ) active @endif has-sub">
                            <a class="js-arrow text-decoration-none" href="{{ route('online.booking') }}">
                                <i class="fa-solid fa-bed"></i>Online-Booking
                            </a>
                        </li>
                        <li class="@if( Route::currentRouteName() === 'admin.recycle' ) active @endif has-sub">
                            <a class="js-arrow text-decoration-none" href="{{ route('admin.recycle') }}">
                                <i class="fa-solid fa-recycle"></i>Recycle bin
                            </a>
                        </li>
                        <li class="@if( Route::currentRouteName() === 'show.contact' ) active @endif has-sub">
                            <a class="js-arrow text-decoration-none" href="{{ route('show.contact') }}">
                                <i class="fa-solid fa-comments"></i>Contact Message
                            </a>

                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->


        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop2">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap2">
                            <div class="logo d-block d-lg-none">
                                <a href="#">
                                    <img src="{{ asset('admin/images/icon/logo-white.png') }}" alt="CoolAdmin" />
                                </a>
                            </div>
                            <div class="header-button2">
                                <div class="header-button-item js-item-menu">
                                    <i class="zmdi zmdi-search"></i>
                                    <div class="search-dropdown js-dropdown">
                                        <form action="">
                                            <input class="au-input au-input--full au-input--h65" type="text" placeholder="Search for datas &amp; reports..." />
                                            <span class="search-dropdown__icon">
                                                <i class="zmdi zmdi-search"></i>
                                            </span>
                                        </form>
                                    </div>
                                </div>
                                <div class="header-button-item @if(Auth::user()->unreadNotifications) has-noti @endif js-item-menu">
                                    <i class="zmdi zmdi-notifications"></i>
                                    <div class="notifi-dropdown js-dropdown">
                                        <div class="notifi__title">
                                            <p>You have {{ Auth::user()->unreadNotifications->count() }} Notifications</p>
                                        </div>
                                        <div class="notiContainer" id="notiContainer">
                                            @foreach (Auth::user()->unreadNotifications as $notification)
                                                <div class="notifi__item">
                                                    <div class="bg-c1 img-cir img-40">
                                                        <i class="zmdi zmdi-email-open"></i>
                                                    </div>
                                                    <div class="content">
                                                        <div class=" d-flex flex-column gap-2">
                                                            <p> {{ $notification->data['name'] }}</p>
                                                            <span class="text-black-50">{{ $notification->data['subject'] }}</span>
                                                        </div>
                                                        <div class=" d-flex justify-content-between">
                                                            <span class="date">{{ $notification->created_at->format('d-M-Y') }}</span>
                                                            <span class="date">{{ $notification->created_at->diffForHumans() }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="notifi__footer">
                                            <a href="#">All notifications</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="header-button-item mr-0 js-sidebar-btn">
                                    <i class="zmdi zmdi-menu"></i>
                                </div>
                                <div class="setting-menu js-right-sidebar d-none d-lg-block">
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#profile">
                                                <i class="zmdi zmdi-account"></i>Profile
                                            </a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#changePassword">
                                                <i class="fa-solid fa-lock"></i>Password Change
                                            </a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="noti-check" @if(Auth::user()->notification_sound_enabled === 1) checked @endif>
                                                    <label class="form-check-label" for="noti-check"> Notification Sound</label>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </header>
            {{-- password change modal  --}}
            <div class="modal fade" id="changePassword" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                Account Password Change
                            </h1>
                            <button type="button" class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ route('profile.passwordChange') }}"
                            method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="recipient-name"
                                        class="col-form-label">Old Password</label>
                                    <input type="password" name="old_password"
                                        value=""
                                        class="form-control" placeholder="Enter Old Password">
                                    @error('old_password')
                                        <small
                                            class=" text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name"
                                        class="col-form-label">New Password</label>
                                    <input type="password" name="new_password"
                                        value=""
                                        class="form-control" placeholder="Enter New Password">
                                    @error('new_password')
                                        <small
                                            class=" text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name"
                                        class="col-form-label">Retype-New Password</label>
                                    <input type="password" name="confirm_password"
                                        value=""
                                        class="form-control" placeholder="Confirm Password">
                                    @error('confirm_password')
                                        <small
                                            class=" text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button"
                                    class="btn btn-secondary text-secondary"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit"
                                    class="btn btn-primary text-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- end  --}}
            {{-- profile modal  --}}
            <div class="modal fade" id="profile" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                Profile
                            </h1>
                            <button type="button" class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ route('profile.update') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="avator"
                                        class="col-form-label">Profile</label>
                                    <div class=" d-flex justify-content-center">
                                        @if (Auth::user()->avatar === null)
                                            <img src="{{ asset('img/profile/Profile.png') }}" class=" w-50" alt="">
                                        @else
                                            <img src="{{ asset('storage/img/profile/'. Auth::user()->avatar) }}" class=" w-50" alt="">
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <input type="file" name="avatar" id="avator"
                                        class="form-control"  disabled>
                                    @error('avatar')
                                        <small class=" text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="name"
                                        class="col-form-label">Name</label>
                                    <input type="text" name="name" id="name"
                                        value="{{ Auth::user()->name }}"
                                        class="form-control"  disabled>
                                    @error('name')
                                        <small class=" text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email"
                                        class="col-form-label">Email</label>
                                    <input type="text" name="email" id="email"
                                        value="{{ Auth::user()->email }}"
                                        class="form-control"  disabled>
                                    @error('email')
                                        <small class=" text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="gender"
                                        class="col-form-label">Gender</label>
                                    <select name="gender" class="form-control" id="gender" disabled>
                                        <option value="" >Select Gender</option>
                                        <option value="male" @if(old('gender',Auth::user()->gender) === "male") selected @endif>Male</option>
                                        <option value="female" @if(old('gender',Auth::user()->gender) === "female") selected @endif>Female</option>
                                        <option value="lgbt" @if(old('gender',Auth::user()->gender) === "lgbt") selected @endif>LGBT</option>
                                    </select>
                                    @error('email')
                                        <small class=" text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button"
                                    class="btn btn-secondary text-secondary"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-dark text-primary" id="editBtn">Edit Profile</button>
                                <button type="submit"  class="btn btn-dark text-primary d-none" id="updateBtn">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- end  --}}
            <aside class="menu-sidebar2 js-right-sidebar d-block d-lg-none">
                <div class="logo">
                    <a href="#">
                        <img src="{{ asset('admin/images/icon/logo-white.png') }}" alt="Cool Admin" />
                    </a>
                </div>
                <div class="menu-sidebar2__content js-scrollbar2">
                    <div class="account2">
                        <div class="image img-cir img-120">
                            @if (Auth::user()->avatar === null)
                                <img src="{{ asset('img/profile/Profile.png') }}" class="" alt="">
                            @else
                                <img src="{{ asset('storage/img/profile/'. Auth::user()->avatar) }}" class="" alt="">
                            @endif
                        </div>
                        <h4 class="name">john doe</h4>
                        <form action="{{ route('login.user') }}" method="POST">
                            @csrf
                            <button type="submit" >Sign out</button>
                        </form>
                    </div>
                    <nav class="navbar-sidebar2">
                        <ul class="list-unstyled navbar__list">
                            <li class="active has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-tachometer-alt"></i>Dashboard
                                </a>
                            </li>
                            <li>
                                <a href="inbox.html">
                                    <i class="fas fa-chart-bar"></i>Inbox</a>
                                <span class="inbox-num">3</span>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-shopping-basket"></i>eCommerce</a>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-trophy"></i>Features
                                    <span class="arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </span>
                                </a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="table.html">
                                            <i class="fas fa-table"></i>Tables</a>
                                    </li>
                                    <li>
                                        <a href="form.html">
                                            <i class="far fa-check-square"></i>Forms</a>
                                    </li>
                                    <li>
                                        <a href="calendar.html">
                                            <i class="fas fa-calendar-alt"></i>Calendar</a>
                                    </li>
                                    <li>
                                        <a href="map.html">
                                            <i class="fas fa-map-marker-alt"></i>Maps</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-copy"></i>Pages
                                    <span class="arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </span>
                                </a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="login.html">
                                            <i class="fas fa-sign-in-alt"></i>Login</a>
                                    </li>
                                    <li>
                                        <a href="register.html">
                                            <i class="fas fa-user"></i>Register</a>
                                    </li>
                                    <li>
                                        <a href="forget-pass.html">
                                            <i class="fas fa-unlock-alt"></i>Forget Password</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-desktop"></i>UI Elements
                                    <span class="arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </span>
                                </a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="button.html">
                                            <i class="fab fa-flickr"></i>Button</a>
                                    </li>
                                    <li>
                                        <a href="badge.html">
                                            <i class="fas fa-comment-alt"></i>Badges</a>
                                    </li>
                                    <li>
                                        <a href="tab.html">
                                            <i class="far fa-window-maximize"></i>Tabs</a>
                                    </li>
                                    <li>
                                        <a href="card.html">
                                            <i class="far fa-id-card"></i>Cards</a>
                                    </li>
                                    <li>
                                        <a href="alert.html">
                                            <i class="far fa-bell"></i>Alerts</a>
                                    </li>
                                    <li>
                                        <a href="progress-bar.html">
                                            <i class="fas fa-tasks"></i>Progress Bars</a>
                                    </li>
                                    <li>
                                        <a href="modal.html">
                                            <i class="far fa-window-restore"></i>Modals</a>
                                    </li>
                                    <li>
                                        <a href="switch.html">
                                            <i class="fas fa-toggle-on"></i>Switchs</a>
                                    </li>
                                    <li>
                                        <a href="grid.html">
                                            <i class="fas fa-th-large"></i>Grids</a>
                                    </li>
                                    <li>
                                        <a href="fontawesome.html">
                                            <i class="fab fa-font-awesome"></i>FontAwesome</a>
                                    </li>
                                    <li>
                                        <a href="typo.html">
                                            <i class="fas fa-font"></i>Typography</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
            <!-- END HEADER DESKTOP-->
            <div class=" d-none">
                <audio controls>
                    <source src="{{ asset('mp3/booking-noti.mp3') }}" type="audio/mpeg">
                </audio>
            </div>
        @yield('content')
    </div>

    <!-- Jquery JS-->
    <script src="{{ asset('admin/vendor/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('admin/vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{ asset('admin/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <!-- Vendor JS       -->
    <script src="{{ asset('admin/vendor/slick/slick.min.js')}}">
    </script>
    <script src="{{ asset('admin/vendor/wow/wow.min.js')}}"></script>
    <script src="{{ asset('admin/vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{ asset('admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
    </script>
    <script src="{{ asset('admin/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{ asset('admin/vendor/counter-up/jquery.counterup.min.js')}}">
    </script>
    <script src="{{ asset('admin/vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{ asset('admin/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{ asset('admin/vendor/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{ asset('admin/vendor/select2/select2.min.js')}}">
    </script>
    <script src="{{ asset('admin/vendor/vector-map/jquery.vmap.js')}}"></script>
    <script src="{{ asset('admin/vendor/vector-map/jquery.vmap.min.js')}}"></script>
    <script src="{{ asset('admin/vendor/vector-map/jquery.vmap.sampledata.js')}}"></script>
    <script src="{{ asset('admin/vendor/vector-map/jquery.vmap.world.js')}}"></script>

    <!-- Main JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="{{ asset('admin/js/main.js') }}"></script>
    @yield('js')



</body>
<script>

    const editBtn = document.querySelector('#editBtn');
    const updateBtn = document.querySelector('#updateBtn');
    editBtn.addEventListener('click',function(e){
        const modal  = e.target.closest('.modal');
        const inputTags = modal.querySelectorAll('input');
        const selectBox = modal.querySelector('select');
        inputTags.forEach((inputTag) => {
            inputTag.removeAttribute('disabled');
        })
        selectBox.removeAttribute('disabled');
        editBtn.classList.add('d-none');
        updateBtn.classList.remove('d-none');
    })
</script>

</html>
<!-- end document-->
