<?php

namespace App\Http\Controllers;

use App\Models\Guard;
use Illuminate\Http\Request;

class GuardController extends Controller
{
    public function index(){
        $guards = Guard::all();
        return view('guards.index', ['guards' => $guards]);
    }

    public function create(){
        return view('guards.create');
    }

    public function store(Request $request){
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'address' => 'required|string',
            'contact_no' => 'required'
        ]);

        Guard::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'contact_no' => $request->contact_no
        ]);

        return redirect()->route('guards.index')->with('message', 'Guard Created Successfully!');
    }

    public function edit(int $id){
        $guard = Guard::findOrFail($id);
        return view('guards.edit', ['guard' => $guard]);
    }

    public function update(Request $request, int $id){
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'address' => 'required|string',
            'contact_no' => 'required'
        ]);

        $guard = Guard::findOrFail($id);

        $guard->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'contact_no' => $request->contact_no
        ]);

        return redirect()->route('guards.index')->with('message', 'Guard Updated Successfully!');
    }

    public function destroy(int $id){
        $guard = Guard::findOrFail($id);
        $guard->delete();

        return redirect()->back()->with('message', 'Guard Deleted Successfully!');
    }
}
