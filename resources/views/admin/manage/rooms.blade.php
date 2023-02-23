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
                                            <option value="">All Booking</option>
                                            <option value="0">Book</option>
                                            <option value="1">Booked</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                    <div class="rs-select2--dark rs-select2--md rs-select2--border">
                                        <select class="js-select2" name="property">
                                            <option value="">All Room Types</option>
                                            @foreach ($roomType as $type)
                                                <option value="">{{ $type->name }}</option>
                                            @endforeach
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
                                            @foreach ($rooms  as $room )
                                            <tr>
                                                <td>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="table-data__info">
                                                        <span>
                                                            <a href="#">{{ $room->room_no }}</a>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class=" w-25">
                                                    <span class="">{{ $room->roomType->name }}</span>
                                                </td>
                                                <td  >
                                                    <div class="rs-select2--trans rs-select2--sm">
                                                        <select class="js-select2" name="property">
                                                            <option value="0"  @selected($room->booking_status === '0')>Available</option>
                                                            <option value="1"  @selected($room->booking_status === '1')>Booked</option>
                                                        </select>
                                                        <div class="dropDownSelect2"></div>
                                                    </div>
                                                </td>
                                                <td >
                                                    @if ($room->booking_status === '1')
                                                        <a href="#" class=" btn btn-warning" data-bs-toggle="modal" data-bs-target="#checkIn{{ $room->id }}">Check In</a>
                                                    @else
                                                        <a href="#" class=" btn btn-info" data-bs-toggle="modal" data-bs-target="#checkIn{{ $room->id }}">Check In</a>
                                                    @endif
                                                </td>
                                                <td >
                                                    @if ($room->booking_status === '1')
                                                        <a href="#" class=" btn btn-warning" data-bs-toggle="modal" data-bs-target="#checkOut{{ $room->id }}">Check Out</a>
                                                    @endif
                                                </td>
                                                <td >
                                                    <a href="#" class=" btn btn-outline-secondary edit">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                    <a href="#" class=" btn btn-outline-secondary edit">
                                                        <i class="fa-solid fa-eye"></i>
                                                    </a>
                                                    <a href="#" class=" btn btn-outline-secondary edit">
                                                        <i class="fa-regular fa-trash-can"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            {{-- check in box  --}}
                                            <div class="modal fade" id="checkIn{{ $room->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $room->room_no . '    -  ' . $room->roomType->name }}</h1>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                      <form>
                                                        <div class="mb-3">
                                                          <label for="recipient-name" class="col-form-label">Check In</label>
                                                          <input type="text" class="form-control" id="recipient-name">
                                                        </div>
                                                      </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary text-secondary" data-bs-dismiss="modal">Close</button>
                                                      <button type="button" class="btn btn-primary text-primary">Submit</button>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                              {{-- check out modal  --}}
                                              <div class="modal fade" id="checkOut{{ $room->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $room->room_no . '    -  ' . $room->roomType->name }}</h1>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                      <form>
                                                        <div class="mb-3">
                                                          <label for="recipient-name" class="col-form-label">Check Out</label>
                                                          <input type="text" class="form-control" id="recipient-name">
                                                        </div>
                                                      </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary text-secondary" data-bs-dismiss="modal">Close</button>
                                                      <button type="button" class="btn btn-primary text-primary">Submit</button>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="user-data__footer">
                                    <a href="#" class="au-btn au-btn-load">load more</a>
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

