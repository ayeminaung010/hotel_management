@extends('admin.layouts.master')

@section('content')
<!-- BREADCRUMB-->
<section class="au-breadcrumb m-t-75">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="au-breadcrumb-content">
                        <div class="au-breadcrumb-left">

                            <ul class="list-unstyled list-inline au-breadcrumb__list">
                                <li class="list-inline-item active">
                                    <a href="#">Home</a>
                                </li>
                                <li class="list-inline-item seprate">
                                    <span>/</span>
                                </li>
                                <li class="list-inline-item">Dashboard</li>
                            </ul>
                        </div>
                        <button class="au-btn au-btn-icon au-btn--green">
                            <i class="zmdi zmdi-plus"></i>add item</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END BREADCRUMB-->

<!-- STATISTIC-->
<section class="statistic">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="statistic__item">
                        <h2 class="number">10,368</h2>
                        <span class="desc">Total Rooms</span>
                        <div class="icon">
                            <i class="fa-solid fa-bed"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="statistic__item">
                        <h2 class="number">388,688</h2>
                        <span class="desc">Reservation</span>
                        <div class="icon">
                            <i class="fa-solid fa-bookmark"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="statistic__item">
                        <h2 class="number">1,086</h2>
                        <span class="desc">staffs</span>
                        <div class="icon">
                            <i class="fa-solid fa-users"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="statistic__item">
                        <h2 class="number">$1,060,386</h2>
                        <span class="desc">complaints</span>
                        <div class="icon">
                            <i class="fa-solid fa-comments"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="statistic__item">
                        <h2 class="number">$1,060,386</h2>
                        <span class="desc">Booked Rooms</span>
                        <div class="icon">
                            <i class="fa-solid fa-list"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="statistic__item">
                        <h2 class="number">$1,060,386</h2>
                        <span class="desc">Available Rooms</span>
                        <div class="icon">
                            <i class="fa-solid fa-circle-check"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="statistic__item">
                        <h2 class="number">$1,060,386</h2>
                        <span class="desc">Check In</span>
                        <div class="icon">
                            <i class="fa-solid fa-square-check"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="statistic__item">
                        <h2 class="number">$1,060,386</h2>
                        <span class="desc">Total Pending Payments</span>
                        <div class="icon">
                            <i class="fa-solid fa-spinner"></i>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6">
                    <div class="statistic__item">
                        <h2 class="number">$1,060,386</h2>
                        <span class="desc">Total Earning</span>
                        <div class="icon">
                            <i class="fa-solid fa-money-bill-1"></i>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6">
                    <div class="statistic__item">
                        <h2 class="number">$1,060,386</h2>
                        <span class="desc">Pending Payments</span>
                        <div class="icon">
                            <i class="fa-solid fa-credit-card"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END STATISTIC-->
@endsection
