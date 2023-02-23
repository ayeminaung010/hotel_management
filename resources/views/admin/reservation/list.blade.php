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
                                <li class="list-inline-item">Reservation Lists</li>
                            </ul>
                        </div>
                        <a href="{{ route('admin.reservation') }}"  class=" btn btn-primary text-black" type="submit">
                            <i class="zmdi zmdi-plus"></i>add Reservation
                        </a>
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
                    <div class="card-header">Manage Reservations</div>
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
                                                <td>Name</td>
                                                <td>Email</td>
                                                <td>Phone</td>
                                                <td>Number Of Guest</td>
                                                <td>Number Of Child</td>
                                                <td>Booking Date</td>
                                                <td>Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($reservations as  $reservation)
                                            <tr>
                                                <td>
                                                    <div class="">
                                                        <span class="">{{ $reservation->first_name.' '.$reservation->last_name }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class=" ">
                                                        <span class="text-black-50">{{ $reservation->email }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="">{{ $reservation->phone_no }}</span>
                                                </td>
                                                <td>
                                                    <span class="">{{ $reservation->number_of_guest }}</span>
                                                </td>
                                                <td>
                                                    <span class="">{{ $reservation->number_of_child }} </span>
                                                </td>
                                                <td>
                                                    <span class="">{{ $reservation->created_at->format('d-M-Y') }} </span>
                                                </td>
                                                <td>
                                                    <button class=" btn btn-outline-secondary edit">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </button>
                                                    <a href="#"  data-bs-toggle="modal" data-bs-target="#detail{{ $reservation->id }}" class=" btn btn-outline-secondary detail">
                                                        <i class="fa-solid fa-eye"></i>
                                                    </a>
                                                    <button class=" btn btn-outline-secondary edit">
                                                        <i class="fa-regular fa-trash-can"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            {{-- Deail out modal  --}}
                                            <div class="modal fade" id="detail{{ $reservation->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h1 class="modal-title fs-5" id="exampleModalLabel">{{$reservation->first_name.' '.$reservation->last_name }}</h1>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                      <form>
                                                        <div class="mb-3">
                                                          <label for="recipient-name" class="col-form-label">Check In Date</label>
                                                          <input type="text" class="form-control" value="{{ $reservation->check_in  }}" id="recipient-name" disabled>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">Check Out Date</label>
                                                            <input type="text" class="form-control" value="{{ $reservation->check_out  }}" id="recipient-name" disabled>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">Room Type</label>
                                                            @foreach ($reservationRoomTypes[$reservation->id] as $roomType)
                                                                <input type="text" class="form-control" value="{{ $roomType->name }}" id="recipient-name" disabled>
                                                            @endforeach
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">Room No</label>
                                                            @foreach ($reservationRoomNos[$reservation->id] as $roomNo)
                                                                <input type="text" class="form-control" value="{{ $roomNo->room_no }}" id="recipient-name" disabled>
                                                            @endforeach
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">Card Type </label>
                                                            <input type="text" class="form-control" value="{{ $reservation->card_type->card_type  }}" id="recipient-name" disabled>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">Card No </label>
                                                            <input type="text" class="form-control" value="{{ $reservation->card_number  }}" id="recipient-name" disabled>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">Address </label>
                                                            <input type="text" class="form-control" value="{{ $reservation->residential_address  }}" id="recipient-name" disabled>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">Total Cose </label>
                                                            <input type="text" class="form-control" value="{{ $reservation->total_cost  }} $" id="recipient-name" disabled>
                                                        </div>
                                                      </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary text-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            @endforeach
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

