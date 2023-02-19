@extends('admin.layouts.master')

@section('content')
<!-- STATISTIC-->
<section >
    <!-- rooom detail  -->
    <div class="row justify-content-center mt-5">
        <div class="col-lg-10">
            <form action="" method="post" novalidate="novalidate">
                <div class="card">
                    <div class="card-header">Room Information</div>
                    <div class="card-body">

                        <div class="row my-2">
                            <div class="col-6">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Room Type</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Room No</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>

                        <div class="row my-2">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="cc-exp" class="control-label mb-1">Check In Date</label>
                                    <input type="date" class=" form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="x_card_code" class="control-label mb-1">Check out date</label>
                                <div class="input-group">
                                    <input type="date" class=" form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Customer Information</div>
                    <div class="card-body">

                        <div class="row my-2">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="cc-exp" class="control-label mb-1">First Name</label>
                                    <input type="text" class=" form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="cc-exp" class="control-label mb-1">Last Name</label>
                                    <input type="text" class=" form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="cc-exp" class="control-label mb-1">Contact Number</label>
                                    <input type="number" class=" form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="x_card_code" class="control-label mb-1">Email Address</label>
                                <div class="input-group">
                                    <input type="email" class=" form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="cc-exp" class="control-label mb-1">ID Card Type</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>ID Card Type</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="x_card_code" class="control-label mb-1">ID Card Number</label>
                                <div class="input-group">
                                    <input type="number" class=" form-control">
                                </div>
                            </div>

                        </div>
                        <div class="row my-2">
                            <div class="col-6">
                                <label for="x_card_code" class="control-label mb-1">Residential Address</label>
                                <div class="input-group">
                                    <input type="text" class=" form-control">
                                </div>
                            </div>
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
