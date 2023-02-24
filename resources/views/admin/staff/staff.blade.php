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
                                <li class="list-inline-item">Manage Staffs</li>
                            </ul>
                        </div>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#addEmployee" class="au-btn au-btn-icon au-btn--green">
                            <i class="zmdi zmdi-plus"></i>add employee
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
                    <div class="card-header">Manage Staff</div>
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
                                                <td>Employee Name</td>
                                                <td>Staff</td>
                                                <td>Work Time</td>
                                                <td>Joining Date</td>
                                                <td>Salary</td>
                                                <td>Change Shift</td>
                                                <td>Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($staffs as  $staff)
                                            <tr>
                                                <td>
                                                    <div class="table-data__info">
                                                        <h6>{{ $staff->name }}</h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="rs-select2--trans rs-select2--sm text-info">
                                                        {{ $staff->position->name }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="">{{ $staff->workingTime->working_date }}</span>
                                                </td>
                                                <td>
                                                    <span class="">{{ $staff->created_at->format('d-m-Y') }}</span>
                                                </td>
                                                <td>
                                                    <span class="">{{ $staff->salary }} $</span>
                                                </td>
                                                <td>
                                                    <a href="#" class=" btn btn-warning" data-bs-toggle="modal" data-bs-target="#staff{{ $staff->id }}">Change Work Time</a>
                                                </td>
                                                <td>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#edit{{ $staff->id }}" class=" mx-1 my-1 btn btn-outline-secondary edit">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#detail{{ $staff->id }}" class=" mx-1 my-1 btn btn-outline-secondary edit">
                                                        <i class="fa-solid fa-eye"></i>
                                                    </a>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#delete{{ $staff->id }}" class=" mx-1 my-1 btn btn-outline-secondary edit">
                                                        <i class="fa-regular fa-trash-can"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <!--change work time  Modal -->
                                            <div class="modal fade" id="staff{{ $staff->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $staff->name }} </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('change.workTime',['id' => $staff->id]) }}" method="post">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">Working Date Time</label>
                                                            <select class="form-select" name="work_time" aria-label="Default select example">
                                                                @foreach ($workTimes as $workTime )
                                                                    <option value="{{ $workTime->id }}" @selected( $staff->workingTime->id === $workTime->id)  >{{ $workTime->working_date }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary text-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary text-primary">Save changes</button>
                                                    </div>
                                                </form>
                                                </div>
                                            </div>
                                            </div>

                                            <!--Edit Box Modal -->
                                            <div class="modal fade" id="edit{{ $staff->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $staff->name }} </h1>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="">
                                                            <div class="mb-3">
                                                                <label for="recipient-name" class="col-form-label">Name</label>
                                                                <input type="text" value="{{ $staff->name }}" class=" form-control ">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="recipient-name" class="col-form-label">Position</label>
                                                                <select class="form-select" name="position" aria-label="Default select example">
                                                                    @foreach ($positions as $position )
                                                                        <option value="{{ $position->id }}" @selected( $staff->position->id === $position->id)  >{{ $position->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="recipient-name" class="col-form-label">Phone</label>
                                                                <input type="text" value="{{ $staff->phone }}" class=" form-control ">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="recipient-name" class="col-form-label">Salary</label>
                                                                <input type="text" value="{{ $staff->salary }}" class=" form-control ">
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary text-secondary" data-bs-dismiss="modal">Close</button>
                                                      <button type="button" class="btn btn-primary text-primary">Save changes</button>
                                                    </div>
                                                  </div>
                                                </div>
                                            </div>


                                            <!--View Box Modal -->
                                            <div class="modal fade" id="detail{{ $staff->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $staff->name }}'s Details </h1>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="">
                                                            <div class="mb-3">
                                                                <label for="recipient-name" class="col-form-label">Name</label>
                                                                <input type="text" value="{{ $staff->name }}" class=" form-control " disabled>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="recipient-name" class="col-form-label">Position</label>
                                                                <select class="form-select" name="position" aria-label="Default select example" disabled>
                                                                    @foreach ($positions as $position )
                                                                        <option value="{{ $position->id }}" @selected( $staff->position->id === $position->id)  >{{ $position->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="recipient-name" class="col-form-label">Work Time</label>
                                                                <select class="form-select" name="position" aria-label="Default select example" disabled>
                                                                    @foreach ($workTimes as $workTime )
                                                                        <option value="{{ $workTime->id }}" @selected( $staff->workingTime->id === $workTime->id)  >{{ $workTime->working_date }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="recipient-name" class="col-form-label">Phone</label>
                                                                <input type="text" value="{{ $staff->phone }}" class=" form-control " disabled>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="recipient-name" class="col-form-label">Salary</label>
                                                                <input type="text" value="{{ $staff->salary }}" class=" form-control " disabled>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary text-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                  </div>
                                                </div>
                                            </div>

                                            {{-- delete modal box  --}}
                                            <div class="modal fade" id="delete{{ $staff->id }}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Confirmation Changes</h1>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                      Are You Sure to Delete {{ $staff->name }}??
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary text-secondary" data-bs-dismiss="modal">Close</button>
                                                        <form action="{{ route('delete.staff',$staff->id ) }}" method="POST">
                                                            @csrf
                                                            <button class="btn btn-danger">Delete</button>
                                                        </form>
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

                        <!--add Employee Box Modal -->
                        <div class="modal fade" id="addEmployee" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Add Employee </h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{ route('add.staff') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">Name</label>
                                                <input type="text" value="" name="name" class=" form-control ">
                                            </div>
                                            <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">Position</label>
                                                <select class="form-select" name="position_id" aria-label="Default select example">
                                                    <option value="">Choose positions</option>
                                                    @foreach ($positions as $position )
                                                        <option value="{{ $position->id }}" @selected( old('position') === $position->id)  >{{ $position->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">Working Date Time</label>
                                                <select class="form-select" name="work_time_id" aria-label="Default select example">
                                                    <option value="">Choose Working Time</option>
                                                    @foreach ($workTimes as $workTime )
                                                        <option value="{{ $workTime->id }}" @selected( old('work_time') === $workTime->id)  >{{ $workTime->working_date }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">Phone</label>
                                                <input type="text" value="" name="phone" class=" form-control ">
                                            </div>
                                            <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">Salary</label>
                                                <input type="text" value="" name="salary" class=" form-control ">
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

