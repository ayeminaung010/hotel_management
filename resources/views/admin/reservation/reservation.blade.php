@extends('admin.layouts.master')

@section('content')
<!-- STATISTIC-->
<section >
    <!-- rooom detail  -->
    <div class="row justify-content-center mt-5">
        <div class="col-lg-10 mt-5">
            <form action="#" method="post" novalidate="novalidate">
                @csrf
                <div class="card">
                    <div class="card-header">Room Information</div>
                    <div class="card-body">

                        <div class="" >
                            <div class="row my-2" id="single_room">
                                <div class="col-6">
                                    <select class="form-select"  name="room_type" id="room_type" aria-label="Default select example">
                                        <option value="">Choose Room Type</option>
                                        @foreach ($room_types as $room_type)
                                            <option value="{{ $room_type->id }}">{{ $room_type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4">
                                    <select class="form-select d-none" id="room_no" name="room_no" aria-label="Default select example">
                                        <option value="">Choose Room No</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <a  class=" btn btn-primary" id="addBtn">Add Room</a>
                                </div>
                            </div>
                            <div class="" id="room_info">

                            </div>
                        </div>


                        <div class="row my-2">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="cc-exp"  class="control-label mb-1">Check In </label>
                                    <input type="date" name="check_in" id="check_in" class=" form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="x_card_code"  class="control-label mb-1">Check out </label>
                                <div class="input-group">
                                    <input type="date" name="check_out" id="check_out" class=" form-control">
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
                                    <input type="number" name="phone_no" class=" form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="x_card_code" class="control-label mb-1">Email Address</label>
                                <div class="input-group">
                                    <input type="email" name='email' class=" form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="cc-exp" class="control-label mb-1">ID Card Type</label>
                                    <select class="form-select" name="card_type" aria-label="Default select example">
                                        <option value="">Choose Card Type</option>
                                        @foreach ($card_types as $card_type )
                                            <option value="{{ $card_type->id }}">{{ $card_type->card_type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="x_card_code" class="control-label mb-1">ID Card Number</label>
                                <div class="input-group">
                                    <input type="number" name="card_no" class=" form-control">
                                </div>
                            </div>

                        </div>
                        <div class="row my-2">
                            <div class="col-6">
                                <label for="x_card_code" class="control-label mb-1">Residential Address</label>
                                <div class="input-group">
                                    <input type="text" name="address" class=" form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-6">
                                <label for="x_card_code" class="control-label mb-1">Number Of Guest</label>
                                <div class="input-group">
                                    <input type="number" name="guest_no" class=" form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="x_card_code" class="control-label mb-1">Number Of Children(eg - child age under 14)</label>
                                <div class="input-group">
                                    <input type="number" name="child_no" class=" form-control">
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


@section('js')
    <script>
        const roomTypes = document.querySelectorAll('#room_type');


        // roomTypes.forEach((roomType) => {
        //     roomType.addEventListener('change',function(){
        //         const data = {
        //             'room_type' : room_type.value
        //         }
        //         console.log('hi');
        //         axios.get('/admin/room_number/get',{params: data})
        //         .then(function (response) {
        //             console.log(response.data);
        //             roomNo.classList.remove('d-none');
        //             for (let i = 0; i < response.data.length; i++) {
        //                 roomNo.innerHTML += `
        //                     <option value="${response.data[i]['id']}">${response.data[i]['room_no']}</option>
        //                 `;
        //             }
        //         })
        //         .catch(function (error) {
        //             console.log(error);
        //         })
        //     })
        // })

        document.addEventListener('change',function(e){
            if(e.target.matches('#room_type')){
                const parent = e.target.closest('#single_room');
                const roomNo = parent.querySelector('#room_no');
                const data = {
                    'room_type' : e.target.value
                }
                console.log(data);
                axios.get('/admin/room_number/get',{params: data})
                .then(function (response) {
                    console.log(response.data);
                    roomNo.classList.remove('d-none');
                    for (let i = 0; i < response.data.length; i++) {
                        roomNo.innerHTML += `
                            <option value="${response.data[i]['id']}">${response.data[i]['room_no']}</option>
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
                    <select class="form-select"  name="room_type" id="room_type" aria-label="Default select example">
                        <option value="">Choose Room Type</option>
                        @if (count($room_types) !== 0)
                            @foreach ($room_types as $room_type)
                                <option value="{{ $room_type->id }}">{{ $room_type->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="col-4">
                    <select class="form-select d-none" id="room_no" name="room_no" aria-label="Default select example">
                        <option value="">Choose Room No</option>
                    </select>
                </div>
                <div class='col-2'>
                    <a  class=" btn btn-danger" onclick="removeRoom(event)" id="removeBtn">Remove</a>
                </div>
            </div>`;
        })

        function removeRoom(e){
            const parent = e.target.closest('#single_room');
            parent.remove();
        }

        const check_in = document.querySelector("#check_in");
        const check_out = document.querySelector("#check_out");

        check_in.addEventListener('change',function(){
            console.log(check_in);
        })

        check_out.addEventListener('change',function(){
            console.log(check_out);
        })
    </script>
@endsection
