<?php

namespace App\Http\Controllers;

use App\Models\Party;
use App\Models\Revenue;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RevenueController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        if($user->role == 2){
            $data = Revenue::with(['student','party'])->get();
        }else{
            $party_id = $user->party_id;
            $data = Revenue::with(['student','party'])->whereHas('party',function($que) use($party_id){
                $que->where('party_id',$party_id);
            })->get();
        }
        return view('revenue.index',compact('data'));
    }

    public function create()
    {
        $data['student'] = Student::all();
        $user = Auth::user();
        if($user->role == 1){
            $data['party'] = Party::where('party_id',$user->party_id)->get();
        }else{
            $data['party'] = Party::all();
        }
        return view('revenue.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $velidate = $request->validate([
            'party_id' => 'required',
            'student_id' => 'required',
            'total_amount' => 'required',
            'paid_amount' => 'required',
            'month' => 'required',
        ]);
        
        $student = Student::where('student_id',$request->student_id)->first();
        $installment_count = 1;
        if(!empty($student->monthly_fees)){
            $revenue = DB::table('revenues')->where('student_id', $request->student_id)->first();
            if(empty($revenue)){
                $amount = 0;
            }
            if($request->has('due_amount')){
                DB::table('revenues')->updateOrInsert(
                [
                    'student_id' => $request->student_id,
                ],
                [
                    "party_id" => $request->party_id,
                    "student_id" => $request->student_id,
                    "total_amount" => $request->total_amount,
                    "paid_amount" => $amount + $request->paid_amount,
                    "due_amount" => $request->due_amount,
                    "reason" => $request->reason,
                    // "reason" => 'SET REASON',
                    'installment_count' => DB::raw('installment_count + ' . $installment_count),
                    "month" => $request->month
                ]
            );
            }else{
                DB::table('revenues')->updateOrInsert(
                [
                    'student_id' => $request->student_id,
                ],
                [
                    "party_id" => $request->party_id,
                    "student_id" => $request->student_id,
                    "total_amount" => $request->total_amount,
                    "paid_amount" => $amount + $request->paid_amount,
                    'installment_count' => DB::raw('installment_count + ' . $installment_count),
                    "month" => $request->month
                ]
            );
            }
        }else{
            if($request->has('due_amount')){
                DB::table('revenues')->updateOrInsert(
                [
                    'student_id' => $request->student_id,
                ],
                [
                    "party_id" => $request->party_id,
                    "student_id" => $request->student_id,
                    "total_amount" => $request->total_amount,
                    "paid_amount" => $request->paid_amount,
                    "due_amount" => $request->due_amount,
                    "reason" => $request->reason,
                    // "reason" => "set reason",
                    'installment_count' => DB::raw('installment_count + ' . $installment_count),
                    "month" => $request->month
                ]
             );
            }else{
            DB::table('revenues')->updateOrInsert(
                [
                    'student_id' => $request->student_id,
                ],
                [
                    "party_id" => $request->party_id,
                    "student_id" => $request->student_id,
                    "total_amount" => $request->total_amount,
                    "paid_amount" => $request->paid_amount,
                    'installment_count' => DB::raw('installment_count + ' . $installment_count),
                    "month" => $request->month
                ]
            );
            }
        }
        return redirect('revenue')->with('flash_message','Revenue Updated Successfully!');
    }

    public function show(string $id)
    {
        $data = Revenue::where('class_id',$id)->first();
        return view('class.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['student'] = Revenue::with('student')->where('rev_id',$id)->first();
        return view('revenue.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->all();
        $input = $request->validate([
            'paid_type' => 'required',
            'total_amount' => 'required',
            'paid_amount' => 'required',
            'month' => 'required',
        ]);

        If($request->has(['due_amount','reason'])){
            $request->validate([
                'due_amount' => 'required',
                'reason' => 'nullable',
            ]);
        }

        $data = $student = Revenue::where('rev_id',$id)->first();

        // if($request->paid_type == 'monthly_fees'){
            $installment_count = $data->installment_count + 1;
        // }else{
        //     $installment_count = 12;
        // }
        if($request->has(['due_amount','reason'])){
            $due = $request->due_amount;
            $reason = $request->reason;
        }else{
            $due = 0; 
            $reason = NULL;
        }
        Revenue::where('rev_id',$data->rev_id)->update([
            'total_amount' => $request->total_amount,
            'paid_amount' => $request->paid_amount,
            'due_amount' => $due,
            'reason' => $reason,
            'month' => $request->month,
            'installment_count' => $installment_count,
        ]);
        return redirect('revenue')->with('flash_message','Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Revenue::where('rev_id',$id)->delete();
        return redirect('revenue')->with('flash_message','Revenue Deleted Successfully!');
    }
}
