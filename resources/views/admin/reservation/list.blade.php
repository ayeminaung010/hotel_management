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
            @if(session('success'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            @if(session('error'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ session('error') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            <div class="card">
                <div class="card-header">Manage Reservations</div>
                <div class="row">
                    <div class="col-xl-12">
                        <!-- USER DATA-->
                        <div class="user-data m-b-40">
                            @if ( count($reservations) !== 0)
                            <div class="d-flex justify-content-between">
                                <div class="filters m-b-45">
                                    <div class="rs-select2--dark rs-select2--sm rs-select2--border">
                                        <select class="js-select2 au-select-dark"  id="reservationSort">
                                            <option value=''>All Time</option>
                                            <option value="asc">Lastest</option>
                                            <option value="desc">Oldest</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                </div>
                                <div class="">
                                    <input type="text" class="" id="reservation_search" placeholder="Search...">
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
                                            <td>Total Cost</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody id="dataContainer">
                                        @foreach ($reservations as  $reservation)
                                        <tr>
                                            <td class=" w-25">
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
                                            <td  class=" w-25">
                                                <span class=" ">{{ $reservation->created_at->format('d-M-Y') }} </span>
                                            </td>
                                            <td class=" w-25">
                                                <span class="">{{ $reservation->total_cost }} $</span>
                                            </td>
                                            <td >
                                                <div class=" flex gap-2 flex-wrap">
                                                    <a href="{{ route('reservation.edit',$reservation->id) }}" class=" btn btn-outline-secondary edit">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                    <a href="#"  data-bs-toggle="modal" data-bs-target="#detail{{ $reservation->id }}" class=" btn btn-outline-secondary detail">
                                                        <i class="fa-solid fa-eye"></i>
                                                    </a>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#delete{{ $reservation->id }}" class=" btn btn-outline-secondary edit">
                                                        <i class="fa-regular fa-trash-can"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>

                                        {{-- delete modal  --}}
                                        <div class="modal fade" id="delete{{ $reservation->id }}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Confirmation Changes</h1>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                  Are You Sure to Delete {{ $reservation->first_name.' '.$reservation->last_name }}? <br>
                                                  Don't worry you can restore and Still see details in the Recycle-bin Section.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary text-secondary" data-bs-dismiss="modal">Close</button>
                                                    <a href="{{ route('reservation.delete',$reservation->id) }}" class="btn btn-danger">Delete</a>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
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
                                                      <label for="" class="col-form-label">Check In Date</label>
                                                      <input type="text" class="form-control" value="{{ $reservation->check_in  }}"  disabled>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="" class="col-form-label">Check Out Date</label>
                                                        <input type="text" class="form-control" value="{{ $reservation->check_out  }}"  disabled>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="" class="col-form-label">Room Type</label>
                                                        @foreach ($reservationRoomTypes[$reservation->id] as $reservationType)
                                                            <input type="text" class="form-control" value="{{ $reservationType->name }}"  disabled>
                                                        @endforeach
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="" class="col-form-label">Room No</label>
                                                        @foreach ($reservationRoomNos[$reservation->id] as $roomNo)
                                                            <input type="text" class="form-control" value="{{ $roomNo->room_no }}"  disabled>
                                                        @endforeach
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="" class="col-form-label">Card Type </label>
                                                        <input type="text" class="form-control" value="{{ $reservation->card_type->card_type  }}"  disabled>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="" class="col-form-label">Card No </label>
                                                        <input type="text" class="form-control" value="{{ $reservation->card_number  }}"  disabled>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="" class="col-form-label">Address </label>
                                                        <input type="text" class="form-control" value="{{ $reservation->residential_address  }}"  disabled>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="" class="col-form-label">Total Cose </label>
                                                        <input type="text" class="form-control" value="{{ $reservation->total_cost  }} $"  disabled>
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
                            @else
                                <h1 class=" text-center  fs-6 text-secondary">There is no Reservations</h1>
                            @endif

                        </div>
                        <!-- END USER DATA-->
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>
<!-- END STATISTIC-->
@endsection

