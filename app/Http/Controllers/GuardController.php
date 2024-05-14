<?php

namespace App\Http\Controllers;

use App\Models\Guard;
use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface;

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

        flash()->success('Guard Created Successfully!');
        return redirect()->route('guards.index');
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

        flash()->success('Guard Updated Successfully!');
        return redirect()->route('guards.index');
    }

    public function destroy(FlasherInterface $flasher, int $id){
        $guard = Guard::findOrFail($id);
        $guard->delete();

        flash()->success('Guard Deleted Successfully!');
        return redirect()->back();
    }
}
