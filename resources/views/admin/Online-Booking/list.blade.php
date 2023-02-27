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
                                <li class="list-inline-item active">
                                    <a href="#">Online-booking Lists</a>
                                </li>
                            </ul>
                        </div>
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
                    <div class="card-header">Manage Recycle</div>
                    <div class="row">
                        <div class="col-xl-12">
                            <!-- USER DATA-->
                            <div class="user-data m-b-40">
                                <div class="table-responsive table-data">
                                    {{-- @if ( count($reservations) !== 0) --}}
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <td>Name</td>
                                                <td>Email</td>
                                                <td>Phone</td>
                                                <td>Number Of Guest</td>
                                                <td>Number Of Child</td>
                                                <td>Booking Date</td>
                                                <td>Total Cost</td>
                                                <td>Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>




                                        </tbody>
                                    </table>
                                    {{-- @else
                                       <h1 class=" text-center  fs-6 text-secondary">There is no Recycle Data</h1>
                                    @endif --}}
                                </div>
                            </div>
                            <!-- END USER DATA-->
                        </div>

                    </div>
                </div>
            </form>
        </div>

    </div>
</section>
<!-- END STATISTIC-->
@endsection

