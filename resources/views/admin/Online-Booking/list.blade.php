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
            <form action="" method="post" novalidate="novalidate">
                <div class="card">
                    <div class="card-header">Manage Recycle</div>
                    <div class="row">
                        <div class="col-xl-12">
                            <!-- USER DATA-->
                            <div class="user-data m-b-40">
                                <div class="table-responsive table-data">
                                    @if ( count($bookings) !== 0)
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <td>Room Type</td>
                                                <td>Check In</td>
                                                <td>Check Out</td>
                                                <td>Number Of Guest</td>
                                                <td>Number Of Child</td>
                                                <td>Date</td>
                                                <td>Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($bookings as  $booking)
                                            <tr>
                                                <td>
                                                    @if ($booking->room_type_id !== null)
                                                        <div class=" ">
                                                            <span class="text-black">{{ $booking->room_type->name }}</span>
                                                        </div>
                                                    @else
                                                        <div class=" ">
                                                            <span class="text-black-50">None</span>
                                                        </div>
                                                    @endif

                                                </td>
                                                <td>
                                                    <span class="">{{ $booking->check_in }}</span>
                                                </td>
                                                <td>
                                                    <span class="">{{ $booking->check_out }}</span>
                                                </td>
                                                <td>
                                                    <span class="">{{ $booking->number_of_guest }} </span>
                                                </td>
                                                <td>
                                                    <span class="">{{ $booking->number_of_child }} </span>
                                                </td>
                                                <td  class=" w-25">
                                                    <span class=" ">{{ $booking->created_at->format('d-M-Y') }} </span>
                                                </td>
                                                <td >
                                                    <div class=" flex gap-2  justify-content-center align-items-center">
                                                        <a href="#"  data-bs-toggle="modal" data-bs-target="#detail{{ $booking->id }}" class=" btn btn-outline-secondary detail">
                                                            <i class="fa-solid fa-eye"></i>
                                                        </a>
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#delete{{ $booking->id }}" class=" btn btn-outline-secondary edit">
                                                            <i class="fa-regular fa-trash-can"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            {{-- delete modal  --}}
                                            <div class="modal fade" id="delete{{ $booking->id }}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Confirmation Changes</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are You Sure to Delete @if($booking->room_type_id !== null) {{ $booking->room_type->name }} @endif? <br>
                                                        You Cannot Restore it. Make it Sure.
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary text-secondary" data-bs-dismiss="modal">Close</button>
                                                        <a href="{{ route('delete.booking',$booking->id) }}" class="btn btn-danger">Delete</a>
                                                    </div>
                                                  </div>
                                                </div>
                                            </div>
                                            {{-- Deail out modal  --}}
                                            <div class="modal fade" id="detail{{ $booking->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h1 class="modal-title fs-5" id="exampleModalLabel">@if($booking->room_type_id !== null){{$booking->room_type->name }} @endif</h1>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                      <form>
                                                        <div class="mb-3">
                                                          <label for="recipient-name" class="col-form-label">Check In Date</label>
                                                          <input type="text" class="form-control" value="{{ $booking->check_in  }}" id="recipient-name" disabled>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">Check Out Date</label>
                                                            <input type="text" class="form-control" value="{{ $booking->check_out  }}" id="recipient-name" disabled>
                                                        </div>
                                                        @if ($booking->room_type_id !== null)
                                                            <div class="mb-3">
                                                                <label for="recipient-name" class="col-form-label">Room Type</label>
                                                                <input type="text" class="form-control" value="{{ $booking->room_type->name }}" id="recipient-name" disabled>
                                                            </div>
                                                        @endif
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">Guest</label>
                                                            <input type="text" class="form-control" value="{{ $booking->number_of_guest }}" id="recipient-name" disabled>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">Child</label>
                                                            <input type="text" class="form-control" value="{{ $booking->number_of_child }}" id="recipient-name" disabled>
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
                                    @else
                                       <h1 class=" text-center  fs-6 text-secondary">There is no Booking </h1>
                                    @endif
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

