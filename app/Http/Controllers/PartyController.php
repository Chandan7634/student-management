<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Party;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PartyController extends Controller
{
     public function index(Request $request)
    {
        $student = Party::latest();
        if(!empty($request->get('party_search'))){
            $student = Party::where('party_name','like','%'.$request->get('party_search').'%');
        }
        $student = $student->paginate(5);
        return view('party.index')->with('students',$student);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('party.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $input = $request->all();
       
       $input = $request->validate([
           'party_name' => 'required',  
           'email' => 'required|email',
           'phone' => 'required|numeric|digits:10',
           'address' => 'required',
           'city' => 'required',
           'district' => 'required',
           'state' => 'required',
           'gst' => 'nullable',
        ]);
        $newparty = Party::create($input);
        User::create([
            'name' => $request->party_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'party_id' => $newparty->party_id,
            'role' => 1,
        ]);
        
        return redirect('parties')->with('flash_message','Party Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Party::where('party_id',$id)->first();
        return view('party.show')->with('party',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Party::where('party_id',$id)->first();
        return view('party.edit')->with('parties',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Party::where('party_id',$id)->first();
        $input = $request->validate([
           'party_name' => 'required',
           'email' => 'required|email',
           'phone' => 'required|numeric|digits:10',
           'address' => 'required',
           'city' => 'required',
           'district' => 'required',
           'state' => 'required',
           'gst' => 'nullable',
        ]);

        if($request->password == NULL){
           $password = User::where('party_id',$id)->get();
           $password = $password->password;
        }else{
            $password = Hash::make($request->password);
        }

        User::where('party_id',$id)->update([
            'name' => $request->party_name,
            'email' => $request->email,
            'password' => $password,
            'role' => 1,
        ]);

        // User::where($student->party_id)->update([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);

        // $input = $request->all();
        $student->update($input);

        return redirect('parties')->with('flash_message','Party Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Party::where('party_id',$id)->first()->delete();
        return redirect('parties')->with('flash_message','Party Deleted Successfully!');
    }
}
