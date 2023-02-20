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
                                <li class="list-inline-item">Reversation</li>
                            </ul>
                        </div>
                        <button class="au-btn au-btn-icon au-btn--green">
                            <i class="zmdi zmdi-plus"></i>add room</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END BREADCRUMB-->

<!-- STATISTIC-->
<section >
    <!-- rooom detail  -->
    <div class="row justify-content-center mt-5">
        <div class="col-lg-11">
            <form action="" method="post" novalidate="novalidate">
                <div class="card">
                    <div class="card-header">Manage Rooms</div>
                    <div class="row">
                        <div class="col-xl-12">
                            <!-- USER DATA-->
                            <div class="user-data m-b-40">
                                <div class="filters m-b-45">
                                    <div class="rs-select2--dark rs-select2--md m-r-10 rs-select2--border">
                                        <select class="js-select2" name="property">
                                            <option selected="selected">All Properties</option>
                                            <option value="">Products</option>
                                            <option value="">Services</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                    <div class="rs-select2--dark rs-select2--sm rs-select2--border">
                                        <select class="js-select2 au-select-dark" name="time">
                                            <option selected="selected">All Time</option>
                                            <option value="">By Month</option>
                                            <option value="">By Day</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                </div>
                                <div class="table-responsive table-data">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <td>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </td>
                                                <td>Room NO</td>
                                                <td>Room Type</td>
                                                <td>Booking Status</td>
                                                <td>Check in</td>
                                                <td>Check out</td>
                                                <td>Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="table-data__info">
                                                        <h6>lori lynch</h6>
                                                        <span>
                                                            <a href="#">johndoe@gmail.com</a>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="role admin">admin</span>
                                                </td>
                                                <td>
                                                    <div class="rs-select2--trans rs-select2--sm">
                                                        <select class="js-select2" name="property">
                                                            <option selected="selected">Full Control</option>
                                                            <option value="">Post</option>
                                                            <option value="">Watch</option>
                                                        </select>
                                                        <div class="dropDownSelect2"></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <button class=" btn btn-warning">Check In</button>
                                                </td>
                                                <td>
                                                    <button class=" btn btn-warning">Check Out</button>
                                                </td>
                                                <td>
                                                    <button class=" btn btn-outline-secondary edit">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </button>
                                                    <button class=" btn btn-outline-secondary edit">
                                                        <i class="fa-solid fa-eye"></i>
                                                    </button>
                                                    <button class=" btn btn-outline-secondary edit">
                                                        <i class="fa-regular fa-trash-can"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="user-data__footer">
                                    <button class="au-btn au-btn-load">load more</button>
                                </div>
                            </div>
                            <!-- END USER DATA-->
                        </div>

                    </div>
                </div>

                <div class=" text-end">
                    <button class=" btn btn-primary">Submit</button>
                </div>
            </form>
        </div>

    </div>
</section>
<!-- END STATISTIC-->
@endsection

