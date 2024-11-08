<?php

namespace App\Http\Controllers;

use App\Models\Party;
use App\Models\Classes;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\StudentMappingModel;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $userId = $user->party_id;
        $student = Student::withWhereHas('party',function($que) use($userId){
            $que->where('party_id',$userId);
        })->get();
        if(!empty($request->get('student_search'))){
            $student = Student::with('party')->where('student_name','like','%'.$request->get('student_search').'%');
        }
        return view('student.index')->with('students',$student);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['party'] = Party::all();
        $data['class'] = Classes::all();
        
        return view('student.create',compact('data'));
    }

    public function store(Request $request)
    {
       $input = $request->all();
       
       $input = $request->validate([
           'student_name' => 'required',
           'school' => 'required',
           'monthly_fees' => 'nullable',
           'yearly_fees' => 'nullable',
           'joining_date' => 'required|date',
           'party_id' => 'required',
           'class_id' => 'required',
        ]);
        
        $student = Student::create($input);
        $input2 = $request->validate([
            'class_id' => 'required',
        ]);
        $input2 = [
            'student_id' => $student->student_id,
            'class_id' => $request->class_id,
        ];
        StudentMappingModel::create($input2);
        return redirect('students')->with('flash_message','Student Added Successfully!');
    }

    public function show(string $id)
    {
        $data = Student::where('student_id',$id)->first();
        return view('student.show')->with('students',$data);
    }

    public function edit(string $id)
    {
        $data['party'] = Party::select('party_id','party_name')->get();
        if(Auth::user()->role == 2){
            $data['class'] = Classes::select('class_id','class_name')->get();   
        }else{
            $data['class'] = Classes::select('class_id','class_name')->where('party_id',Auth::user()->party_id)->get();   
        }
        $data['student'] = Student::where('student_id',$id)->first();

        $data['student_class'] = StudentMappingModel::where('student_id',$data['student']->student_id)->first();

        $data['students_class2'] = Classes::where('class_id',$data['student_class']->class_id)->first();
        // return $data;
        return view('student.edit')->with('students',$data);
    }

    public function update(Request $request, string $id)
    {
        $student = Student::where('student_id',$id)->first();
        if($request->monthly_fees  != ''){
            $input = $request->validate([
                'student_name' => 'required',
                'school' => 'required',
                'monthly_fees' => 'nullable',
                'joining_date' => 'required|date',
                'party_id' => 'required',
            ]);
            $input['yearly_fees'] = NULL;
        }else{
            $input = $request->validate([
                'student_name' => 'required',
                'school' => 'required',
                'yearly_fees' => 'nullable',
                'joining_date' => 'required|date',
                'party_id' => 'required',
            ]);
            $input['monthly_fees'] = NULL;
        }
         

        Student::where('student_id',$id)->update($input);
        
        StudentMappingModel::where('student_id', $id)->update(['class_id' => $request->class_id]);
        return redirect('students')->with('flash_message','Student Updated Successfully!');
    }

    public function destroy(string $id)
    {
        Student::where('student_id',$id)->delete();
        return redirect('students')->with('flash_message','Student Deleted Successfully!');
    }
}
