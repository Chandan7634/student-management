<?php

namespace App\Http\Controllers;

use App\Models\Party;
use App\Models\Classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        if($user->role == 2){
           $class = Classes::with('party')->get();
            if(!empty($request->get('class_search'))){
                $class = Classes::where('class_name','like','%'.$request->get('class_search').'%');
            } 
        }else{
            $userId = $user->party_id;
            $class = Classes::withWhereHas('party',function($que) use($userId) {
                $que->where('party_id',$userId);
            })->get();
            if(!empty($request->get('class_search'))){
                $class = Classes::where('class_name','like','%'.$request->get('class_search').'%');
            }
        }

        return view('class.index',compact('class'));
    }

    public function create()
    {   
        $party = Party::all();
        return view('class.create',compact('party'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $input = $request->all();
       
       $input = $request->validate([
           'class_name' => 'required',
           'party_id' => 'required',
        ]);
        
        Classes::create($input);
        return redirect('classes')->with('flash_message','Class Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Classes::where('class_id',$id)->first();
        return view('class.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['class'] = Classes::where('class_id',$id)->first();

        $data['party'] = Party::select('party_id','party_name')->get();
        // return $data;

        return view('class.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $class = Classes::find($id);
        $input = $request->validate([
           'class_name' => 'required',
           'party_id' => 'required',
        ]);

        $input = $request->all();
        $class->update($input);

        return redirect('classes')->with('flash_message','Class Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Classes::where('class_id',$id)->first()->delete();
        return redirect('classes')->with('flash_message','Class Deleted Successfully!');
    }
}
