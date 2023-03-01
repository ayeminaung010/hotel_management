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
                                <li class="list-inline-item">Manage Messages</li>
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
                    <div class="card-header">Manage Contact Message</div>

                    <div class="row">
                        <div class="col-xl-12">
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ session('success') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            @if(session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>{{ session('error') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            <!-- USER DATA-->
                            <div class="user-data m-b-40">
                                @if (count($contacts) !== 0)
                                <div class="filters m-b-45">
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
                                                <td>Subject</td>
                                                <td>Reply Status</td>
                                                <td>Date</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($contacts as $contact )
                                            <tr>
                                                <td class=" w-25">
                                                    <span class="">{{ $contact->name }}</span>
                                                </td>
                                                <td>
                                                    <span class="">{{ $contact->email }}</span>
                                                </td>
                                                <td class=" w-25">
                                                    <span class="">{{ $contact->subject }} </span>
                                                </td>
                                                <td class=" w-25">
                                                    @if ($contact->status !== 'true')
                                                        <span class="text-danger text-uppercase">
                                                            <i class="fa-solid fa-circle-xmark me-2"></i>
                                                            {{ $contact->status }}
                                                        </span>
                                                    @else
                                                        <span class="text-success text-uppercase">
                                                            <i class="fa-solid fa-check me-2"></i>
                                                            {{ $contact->status }}
                                                        </span>
                                                    @endif
                                                </td>
                                                <td  class=" w-25">
                                                    <span class=" ">{{ $contact->created_at->format('d-M-Y') }} </span>
                                                </td>
                                                <td >
                                                    <div class=" flex gap-2  justify-content-center align-items-center">
                                                        <a href="#"  data-bs-toggle="modal" data-bs-target="#reply{{ $contact->id }}" class=" btn btn-outline-secondary detail">
                                                            <i class="fa-solid fa-reply"></i>
                                                        </a>
                                                        <a href="#"  data-bs-toggle="modal" data-bs-target="#detail{{ $contact->id }}" class=" btn btn-outline-secondary detail">
                                                            <i class="fa-solid fa-eye"></i>
                                                        </a>
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#delete{{ $contact->id }}" class=" btn btn-outline-secondary edit">
                                                            <i class="fa-regular fa-trash-can"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            {{-- delete modal  --}}
                                            <div class="modal fade" id="delete{{ $contact->id }}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Confirmation Changes</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are You Sure to Delete  {{ $contact->name }}'s message? <br>
                                                        You Cannot Restore it. Make it Sure.
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary text-secondary" data-bs-dismiss="modal">Close</button>
                                                        <a href="{{ route('delete.contact',$contact->id) }}" class="btn btn-danger">Delete</a>
                                                    </div>
                                                  </div>
                                                </div>
                                            </div>

                                            {{-- Deail out modal  --}}
                                            <div class="modal fade" id="detail{{ $contact->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h1 class="modal-title fs-5" id="exampleModalLabel">{{$contact->name }}</h1>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                      <form>
                                                        <div class="mb-3">
                                                          <label for="recipient-name" class="col-form-label">Email</label>
                                                          <input type="text" class="form-control" value="{{ $contact->email  }}" id="recipient-name" disabled>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">Subject</label>
                                                            <input type="text" class="form-control" value="{{ $contact->subject  }}" id="recipient-name" disabled>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">Message</label>
                                                            <textarea name="" id="" class=" form-control" cols="30" rows="10"  disabled>{{ $contact->message }}</textarea>
                                                        </div>
                                                      </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary text-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                  </div>
                                                </div>
                                            </div>

                                            {{-- Reply modal  --}}
                                            <div class="modal fade" id="reply{{ $contact->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h1 class="modal-title fs-5" id="exampleModalLabel">{{$contact->name }}</h1>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('reply.contactMessage',$contact->id) }}" method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <input type="hidden" name="sendEmail" class="form-control" value="{{ $contact->email  }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="recipient-name" class="col-form-label">Subject</label>
                                                                <input type="text" name="subject" class="form-control" value="" placeholder="Enter Subject.." id="recipient-name" >
                                                                @error('subject')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="recipient-name" class="col-form-label">Message</label>
                                                                <textarea name="message" id="" cols="30" rows="10" placeholder="Enter Message" class=" form-control"></textarea>
                                                                @error('message')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary text-secondary" data-bs-dismiss="modal">Close</button>
                                                          <button type="submit" class="btn btn-secondary text-secondary" data-bs-dismiss="modal">Send</button>
                                                        </div>
                                                    </form>
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
                                    <h1 class=" text-center">There is no contact message</h1>
                                @endif
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
