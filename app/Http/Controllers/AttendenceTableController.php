<?php

namespace App\Http\Controllers;

use App\Models\Revenue;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\StudentMappingModel;

class AttendenceTableController extends Controller
{
    public function fetch(Request $request){
        $party_id = $request->partyId;

        $table = '<table class="table table-bordered table-striped">';
        $data = StudentMappingModel::where('class_id',$request->classId)->withWhereHas('student_one',function($que) use($party_id){
            $que->where('party_id',$party_id);
        })->get();

        foreach($data as $d){
            $table .= "<tr>
            <td>".$d->student_one->student_name."</td>
            <td> <input type='checkbox' value=".$d->student_one->student_id." name='attend_student[]'> </td>
            </tr>";
        }
        $table .= "</table>";
        return $table;
    }

    public function fetch_revenue(Request $request){
        if(!empty($request->student)){
            $data = Student::where('student_id',$request->student)->first();
            $rev = Revenue::select('due_amount')->where('student_id',$request->student)->first();
            if(!empty($data['monthly_fees']) || !empty($data['yearly_fees'])){
                if(!empty($rev)){
                    if($rev->due_amount == 0){
                        return 'Student already paid full amount!';
                    }else{
                        return $data['monthly_fees'] + $rev->due_amount;
                    }
                }
            }
            if($data['monthly_fees'] != '') {
                return $data['monthly_fees'];
            }else{
                return $data['yearly_fees'];
            }
        }
    }

    public function fetch_student(Request $request){
        if(!empty($request->partyId)){
            $option = '<option value="">Select Student</option>';
            $data = Student::where('party_id',$request->partyId)->get();
            foreach($data as $d){
                $option .= "<option value=".$d->student_id.">".$d->student_name."</option>"; 
            }
            return $option;
        }
    }

    public function edit_revenue(Request $request){
        if(!empty($request->type) && !empty($request->editId)){
            $type = $request->type;
            $data['revenue'] = Revenue::where('rev_id',$request->editId)->first();
                if($data['revenue']->installment_count < 12){
                    $data['student'] = Student::where('student_id',$data['revenue']->student_id)->first();
                    if($data['revenue']->installment_count != 0){
                        if($type == 'yearly_fees'){
                            return $data['student']->monthly_fees * (12-$data['revenue']->installment_count) + $data['revenue']->due_amount;
                        }else{
                            return $data['student']->$type + $data['revenue']->due_amount;
                        }
                    }else{
                        return $data['student']->$type + $data['revenue']->due_amount;
                    }
                }else{
                    if($data['revenue']->due_amount == 0){
                        return "Student already paid full amount!";
                    }else{
                        return $data['revenue']->due_amount;
                    }
                }
            }
        }
    }
