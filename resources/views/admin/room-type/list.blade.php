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
                                <li class="list-inline-item">
                                    <a href="#">Manage Room Types</a>
                                </li>
                            </ul>
                        </div>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#addRoomType" class="au-btn au-btn-icon au-btn--green">
                            <i class="zmdi zmdi-plus"></i>add room type
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
                @if (count($roomTypes) !== 0)


                <div class="card">
                    <div class="card-header">Manage Room Types</div>
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
                                                <td>Room Name</td>
                                                <td>Image </td>
                                                <td>Price Per Night</td>
                                                <td>Description</td>
                                                <td>Date</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($roomTypes as  $roomType)
                                            <tr>
                                                <td>
                                                    <div class="table-data__info">
                                                        <h6>{{ $roomType->name }}</h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="">
                                                        {{-- <img src="{{ Storage::disk('dropbox')->get($roomType->image)  }}"  alt=""> --}}
                                                        <img src="{{ asset('storage/img/roomTypes/'.$roomType->image) }}" alt="">
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="">{{ $roomType->price_per_night }} $</span>
                                                </td>
                                                <td>
                                                    <span class="">{{ Str::substr($roomType->description, 0, 100). '...' }}</span>
                                                </td>
                                                <td>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#edit{{ $roomType->id }}" class=" mx-1 my-1 btn btn-outline-secondary edit">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#detail{{ $roomType->id }}" class=" mx-1 my-1 btn btn-outline-secondary edit">
                                                        <i class="fa-solid fa-eye"></i>
                                                    </a>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#delete{{ $roomType->id }}" class=" mx-1 my-1 btn btn-outline-secondary edit">
                                                        <i class="fa-regular fa-trash-can"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                             {{-- delete modal  --}}
                                             <div class="modal fade" id="delete{{ $roomType->id }}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Confirmation Changes</h1>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                      Are You Sure to Delete {{ $roomType->name }}? <br>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary text-secondary" data-bs-dismiss="modal">Close</button>
                                                        <a href="{{ route('delete.roomType',$roomType->id) }}" class="btn btn-danger">Delete</a>
                                                    </div>
                                                  </div>
                                                </div>
                                            </div>

                                            {{-- Deail  modal  --}}
                                            <div class="modal fade" id="detail{{ $roomType->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h1 class="modal-title fs-5" id="exampleModalLabel">{{$roomType->name }}</h1>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">Room Name</label>
                                                            <input type="text" class="form-control" value="{{ $roomType->name  }}" id="recipient-name" disabled>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">Image</label>
                                                            <img src="{{ asset('storage/img/roomTypes/'.$roomType->image)  }}" class="w-50" alt="">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">Price Per Night</label>
                                                            <input type="text" class="form-control" value="{{ $roomType->price_per_night  }}" id="recipient-name" disabled>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">Description</label>
                                                            <textarea name="" id="" class="form-control" cols="30" rows="10">{{ $roomType->description  }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary text-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                  </div>
                                                </div>
                                            </div>

                                            <!--update Modal -->
                                            <div class="modal fade" id="edit{{ $roomType->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h1 class="modal-title fs-5" id="exampleModalLabel">Update Room Types </h1>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('update.roomType',$roomType->id) }}" enctype="multipart/form-data" method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="recipient-name" class="col-form-label">Name</label>
                                                                <input type="text" value="{{ old('name',$roomType->name) }}" placeholder="Enter Room Type Name" name="name" class=" form-control ">
                                                                @error('name')
                                                                    <small class=" text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="recipient-name" class="col-form-label">Image</label>
                                                                <input type="file" name="image" class="form-control" id="">
                                                                @error('image')
                                                                    <small class=" text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="recipient-name" class="col-form-label">Price Per Night</label>
                                                                <input type="number" value="{{ old('price',$roomType->price_per_night) }}"  name="price" placeholder="Enter Price" class=" form-control ">
                                                                @error('price')
                                                                    <small class=" text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="recipient-name" class="col-form-label">Description</label>
                                                                <textarea name="description"  id="description" placeholder="Enter Description" class=" form-control" cols="30" rows="10">{{ old('description',$roomType->description) }}</textarea>
                                                                @error('description')
                                                                    <small class=" text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary text-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary text-primary">Save</button>
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
                            </div>
                            <!-- END USER DATA-->
                        </div>
                    </div>
                </div>
                @else
                 <h1>There is no room types</h1>
                @endif

            </form>
        </div>

        <!--add room type Box Modal -->
        <div class="modal fade" id="addRoomType" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Add Room Types </h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('store.roomType') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Name</label>
                            <input type="text" value="{{ old('name') }}" placeholder="Enter Room Type Name" name="name" class=" form-control ">
                            @error('name')
                                <small class=" text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Image</label>
                            <input type="file" name="image" class="form-control" id="">
                            @error('image')
                                <small class=" text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Price Per Night</label>
                            <input type="number" value="{{ old('price') }}"  name="price" placeholder="Enter Price" class=" form-control ">
                            @error('price')
                                <small class=" text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Description</label>
                            <textarea name="description"  id="description" placeholder="Enter Description" class=" form-control" cols="30" rows="10">{{ old('description','Lorem ipsum, dolor sit amet consectetur adipisicing elit. Necessitatibus autem adipisci minus corrupti facere, sunt aut sint repellat? Exercitationem, mollitia.') }}</textarea>
                            @error('description')
                                <small class=" text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary text-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary text-primary">Add</button>
                    </div>
                </form>
              </div>
            </div>
        </div>
    </div>
</section>
<!-- END STATISTIC-->
@endsection

