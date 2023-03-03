@extends('admin.layouts.master')

@section('content')
<!-- STATISTIC-->
<section >
    <!-- rooom detail  -->
    <div class="row justify-content-center mt-5">
        <div class="col-lg-10 mt-5">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close align-middle" data-bs-dismiss="alert" aria-label="Close">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session('error') }}</strong>
                    <button type="button" class="btn-close align-middle" data-bs-dismiss="alert" aria-label="Close">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>
            @endif

            <a href="{{ route('reservation.index') }}" class="my-3 btn btn-info">
                Lists
            </a>
            <form action="{{ route('reservation.update',$reservation->id) }}" method="POST" novalidate="novalidate">
                @csrf
                <div class="card">
                    <div class="card-header text-info">Room Information</div>
                    <div class="card-body">
                        <input type="hidden" name="totalDay" id="totalDay" value="">
                        <div class="" >
                            <div class="col-2">
                                <a  class=" btn btn-primary" id="addBtn">Add Room</a>
                            </div>
                            <div class="row my-2 justify-content-center align-items-center" id="single_room">
                                <div class="col-6">
                                    @foreach (json_decode($reservation->room_type_id) as $room_type_id)
                                        <select class="form-select my-2"  name="room_type[]" id="room_type" aria-label="Default select example">
                                            <option value="">Choose Room Type</option>
                                            @foreach ($room_types as $room_type)
                                                <option value="{{ $room_type->id }}"
                                                    @selected((collect(old('room_type',$room_type_id))->contains($room_type['id'])))
                                                >
                                                    <span>{{ $room_type->name }}</span>
                                                    <span>-------------</span>
                                                    <span>{{ $room_type->price_per_night }} $ /-</span>
                                                </option>
                                            @endforeach
                                        </select>
                                    @endforeach
                                    @error('room_type')
                                        <small class=" text-danger">{{ $message  }}</small>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    @foreach (json_decode($reservation->room_id) as $room_id)
                                        <select class="form-select my-2" id="room_no" name="room_no[]" aria-label="Default select example">
                                            @foreach ($room_nos as $room_no )
                                                <option value="{{ $room_no->id }}" class=' d-flex justify-between '
                                                    @selected((collect(old('room_no',$room_id))->contains($room_no['id'])))
                                                >
                                                    <span>{{ $room_no->room_no }}</span>
                                                </option>
                                            @endforeach
                                        </select>
                                    @endforeach
                                    @error('room_no')
                                        <small class=" text-danger">{{ $message  }}</small>
                                    @enderror
                                </div>
                                <div class="col-2">
                                    <a  class=" btn btn-danger my-2" onclick="removeRoom(event)" id="removeBtn">Remove All </a>
                                </div>
                            </div>
                            <div class="" id="room_info">
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="cc-exp"  class="control-label mb-1">Check In </label>
                                    <input type="date" name="check_in" value="{{ old('check_in',$reservation->check_in) }}" id="check_in" class=" form-control">
                                </div>
                                @error('check_in')
                                    <small class=" text-danger">{{ $message  }}</small>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="x_card_code"  class="control-label mb-1">Check out </label>
                                <div class="input-group">
                                    <input type="date" name="check_out" value="{{ old('check_out',$reservation->check_out) }}" id="check_out" class=" form-control">
                                </div>
                                @error('check_out')
                                    <small class=" text-danger">{{ $message  }}</small>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="row mt-4">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="cc-exp"  class="control-label mb-1 text-bolder text-info">Room Booking Details</label>
                                    <div class="d-flex gap-5 flex-wrap fs-6">
                                        <div class=" d-flex flex-column gap-2">
                                            <span>Total Day  </span>
                                            <span>Total price </span>
                                        </div>
                                        <div class=" d-flex flex-column gap-2">
                                            <span id="total_days"></span>
                                            <span id="total_price"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="card">
                    <div class="card-header text-info">Customer Information</div>
                    <div class="card-body">
                        <div class="row my-2">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="cc-exp" class="control-label mb-1">First Name</label>
                                    <input type="text" name="first_name"  value="{{ old('first_name',$reservation->first_name) }}" class=" form-control">
                                </div>
                                @error('first_name')
                                    <small class=" text-danger">{{ $message  }}</small>
                                @enderror
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="cc-exp" class="control-label mb-1">Last Name</label>
                                    <input type="text" name="last_name"  value="{{ old('last_name',$reservation->last_name) }}" class=" form-control">
                                </div>
                                @error('last_name')
                                    <small class=" text-danger">{{ $message  }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="cc-exp" class="control-label mb-1">Contact Number</label>
                                    <input type="number" name="phone_no" value="{{ old('phone_no','09089589',$reservation->phone_no) }}" class=" form-control">
                                </div>
                                @error('phone_no')
                                    <small class=" text-danger">{{ $message  }}</small>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="x_card_code" class="control-label mb-1">Email Address</label>
                                <div class="input-group">
                                    <input type="email" name='email' value="{{ old('email',$reservation->email) }}" class=" form-control">
                                </div>
                                @error('email')
                                    <small class=" text-danger">{{ $message  }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="cc-exp" class="control-label mb-1">ID Card Type</label>
                                    <select class="form-select" name="card_type" aria-label="Default select example">
                                        <option value="">Choose Card Type</option>
                                        @foreach ($card_types as $card_type )
                                            <option value="{{ $card_type->id }}" @selected(old('card_type',$reservation->card_type_id) === $card_type->id ) >{{ $card_type->card_type }}</option>
                                        @endforeach
                                    </select>
                                    @error('card_type')
                                        <small class=" text-danger">{{ $message  }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="x_card_code" class="control-label mb-1">ID Card Number</label>
                                <div class="input-group">
                                    <input type="number" value="{{ old('card_no',$reservation->card_number) }}" name="card_no" class=" form-control">
                                </div>
                                @error('card_no')
                                    <small class=" text-danger">{{ $message  }}</small>
                                @enderror
                            </div>

                        </div>
                        <div class="row my-2">
                            <div class="col-6">
                                <label for="x_card_code" class="control-label mb-1">Residential Address</label>
                                <div class="input-group">
                                    <input type="text" value="{{ old('address',$reservation->residential_address) }}" name="address" class=" form-control">
                                </div>
                                @error('address')
                                    <small class=" text-danger">{{ $message  }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-6">
                                <label for="x_card_code" class="control-label mb-1">Number Of Guest</label>
                                <div class="input-group">
                                    <input type="number" value="{{ old('guest_no',$reservation->number_of_guest) }}" name="guest_no" class=" form-control">
                                </div>
                                @error('guest_no')
                                    <small class=" text-danger">{{ $message  }}</small>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="x_card_code" class="control-label mb-1">Number Of Children(child age under 14)</label>
                                <div class="input-group">
                                    <input type="number" value="{{ old('child_no',$reservation->number_of_child) }}" name="child_no" class=" form-control">
                                </div>
                                @error('child_no')
                                    <small class=" text-danger">{{ $message  }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" text-end">
                    <button type="submit" class=" btn btn-outline-primary ">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- END STATISTIC-->
@endsection


@section('js')
    <script>
        const roomTypes = document.querySelectorAll('#room_type');

        var price_per_night = 0 ;
        document.addEventListener('change',function(e){
            if(e.target.matches('#room_type')){
                const parent = e.target.closest('#single_room');
                const roomNo = parent.querySelector('#room_no');
                const data = {
                    'room_type' : e.target.value
                }
                roomNo.innerHTML = '<option value="">Choose Room No</option>';
                axios.get('/admin/room_number/get',{params: data})
                .then(function (response) {
                    console.log(response.data[1][0]);
                    price_per_night = response.data[1][0];

                    roomNo.classList.remove('d-none');
                    for (let i = 0; i < response.data[0].length; i++) {
                        roomNo.innerHTML += `
                            <option value="${response.data[0][i]['id']}" class=' d-flex justify-between '>
                                <span>${response.data[0][i]['room_no']}</span>
                            </option>
                        `;
                    }
                })
                .catch(function (error) {
                    console.log(error);
                })
            }
        })

        const addBtn = document.querySelector('#addBtn');
        addBtn.addEventListener('click',function(){
            const room_info = document.querySelector('#room_info');
            room_info.innerHTML += `
            <div class="row my-2" id="single_room" >
                <div class="col-6">
                    <select class="form-select"  name="room_type[]" id="room_type" aria-label="Default select example">
                        <option value="">Choose Room Type</option>
                        @if (count($room_types) !== 0)
                            @foreach ($room_types as $room_type)
                                <option value="{{ $room_type->id }}" @selected((collect(old('room_type'))->contains($room_type['id'])))>
                                    <span>{{ $room_type->name }}</span>
                                    <span>-------------</span>
                                    <span>{{ $room_type->price_per_night }} $ /-</span>
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="col-4">
                    <select class="form-select d-none" id="room_no" name="room_no[]" aria-label="Default select example">
                        <option value="">Choose Room No</option>
                    </select>
                </div>
                <div class='col-2'>
                    <a  class=" btn btn-danger" onclick="removeRoom(event)" id="removeBtn">Remove</a>
                </div>
            </div>`;
        })

        function removeRoom(event){
            const parent = event.target.closest('#single_room');
            const roomType = parent.querySelector('#room_type');
            parent.remove();
        }

        const check_in = document.querySelector("#check_in");
        const check_out = document.querySelector("#check_out");

        const totalDays = document.querySelector('#total_days');
        const totalPrice = document.querySelector('#total_price');
        const totalDay = document.querySelector('#totalDay');

        check_in.addEventListener('change',function(){
            totalpriceFun()
        })

        check_out.addEventListener('change',function(){
            totalpriceFun()
        })
        totalpriceFun();
        function totalpriceFun(){
            if (check_in.value && check_out.value) {
                const checkInDate = new Date(check_in.value);
                const checkOutDate = new Date(check_out.value);
                const differenceInMs = checkOutDate - checkInDate;
                const differenceInDays = differenceInMs / (1000 * 60 * 60 * 24);

                console.log(differenceInDays);
                totalDay.value = differenceInDays;
            }
        }

    </script>
@endsection
