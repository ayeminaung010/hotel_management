<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Position;
use App\Models\WorkingTime;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    //show
    public function show(){
        $staffs = Staff::get();
        $positions  = Position::get();
        $workTimes  = WorkingTime::get();
        return view('admin.staff.staff',compact('staffs','positions','workTimes'));
    }

    //change
    public function change(Request $request,$id){
        // dd($id);
        $staff  = Staff::where('id',$id)->first();
        $staff->working_time_id = $request->work_time;
        $staff->save();
        return back()->with(['success' => 'SuccessFully Updated']);
    }

    public function delete($id){
        // dd($id);
        $result = Staff::where('id',$id)->delete();
        if($result){
            return back()->with(['success'=> 'deleted successfully']);
        }
    }

    //add
    public function add(Request $request){
        $request->validate([
            'name' => 'required',
            'position_id' => 'required',
            'work_time_id' => 'required',
            'phone' => 'required',
            'salary' => 'required',
        ]);
        $staff = new Staff();
        $staff->name = $request->name;
        $staff->position_id = $request->position_id;
        $staff->working_time_id = $request->work_time_id;
        $staff->phone = $request->phone;
        $staff->salary = $request->salary;
        $staff->save();
        return back()->with(['success' => 'Create SuccessFully']);
    }

    //update
    public function update(Request $request,$id){
        $staff  = Staff::where('id',$id)->first();
        $staff->name = $request->name;

        $staff->position_id = $request->position;
        $staff->working_time_id = $request->work_time;
        $staff->phone = $request->phone;
        $staff->salary = $request->salary;
        $result = $staff->update();
        return redirect()->route('admin.staff')->with(['success' => 'created success']);
    }
}
