<?php

namespace App\Http\Controllers;

use App\Models\Party;
use App\Models\Classes;
use App\Models\Student;
use App\Models\Attendence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\StudentMappingModel;
use Illuminate\Support\Facades\Auth;

class AttendenceController extends Controller
{
    public function index(Request $request)
    {
        
        // $attendence = Attendence::with(['party','class'])->get();
        $user = Auth::user();
        $party_id = Auth::user()->party_id;
        if($user->role == 1){
            $attendence = Attendence::with(['party','class'])
            ->whereHas('party',function($que) use($party_id){
                $que->where('party_id',$party_id);
            })->get();
        }
        if($user->role == 2){
            $attendence = Attendence::with(['party','class'])->get();
        }
        return view('attendence.index',compact('attendence'));
    }

    public function create()
    {
        $user = Auth::user();
        if($user->role == 1){
            $data['class'] = Classes::where('party_id',$user->party_id)->get();
        }else{
            $data['class'] = Classes::all();
        }
        $data['party'] = Party::all();
        return view('attendence.create',compact('data'));
    }

    public function store(Request $request)
    {
       $input = $request->all();

       $input = $request->validate([
        'party_id' => 'required',
        'class_id' => 'required',
        'attend_student' => 'required',
       ]);
        $name_arr = array();
        foreach($request->attend_student as $student_name){
            $d = Student::select('student_name')->where('student_id',$student_name)->get();
            foreach($d as $g){
                $name_arr[] = $g['student_name'];
            }
        }
        $result = array_combine($request->attend_student, $name_arr);
            DB::table('attendance')
            ->updateOrInsert(
                [
                    'date' => $request->date, 
                    'party_id' => $request->party_id, 
                    'class_id' => $request->class_id
                ],
                [
                    'date' => $request->date,
                    'class_id' => $request->class_id,
                    'party_id' => $request->party_id,
                    'daily_attendance' => json_encode($result)
                ]
            );
        return redirect('attendence')->with('flash_message','Attendence Added Successfully!');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Attendence::where('class_id',$id)->first();
        return view('class.show',compact('data'));
    }

    public function edit(string $id)
    {
        $data['attendence'] = Attendence::where('attendance_id',$id)->first();
        $class_id = $data['attendence']['class_id'];
        $party_id = $data['attendence']['party_id'];
         $data['student_mapping'] = StudentMappingModel::where('class_id',$class_id)->withWhereHas('student_one',function($que) use($party_id) {
            $que->where('party_id',$party_id);
        })->get();
        $key = array();
        foreach($data['attendence']->daily_attendance as $k=>$value){
            $key[] = $k;
        }
        $data['key'] = $key;

        // return $data;
        return view('attendence.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $attendence = Attendence::find($id);

        $name_arr = array();
        foreach($request->attend_student as $student_name){
            $d = Student::select('student_name')->where('student_id',$student_name)->get();
            foreach($d as $g){
                $name_arr[] = $g['student_name'];
            }
        }
        $result = array_combine($request->attend_student, $name_arr);
        $attendence->date = $request->date;
        $attendence->daily_attendance = $result;
        $attendence->save();
        return redirect('attendence')->with('flash_message','Attendence Updated Successfully!');
    }

    public function destroy(string $id)
    {
        Attendence::where('attendance_id',$id)->first()->delete();
        return redirect('attendence')->with('flash_message','Attendence Deleted Successfully!');
    }
}
