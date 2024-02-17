<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::get();
        return view('admin.user.list', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = $this->messages();
        $data = $request->validate([
            'name' => 'required|string|min:5|max:255',
            'user' => 'required|string|min:5|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8',
        ], $messages);
        $data['password'] = Hash::make($request['password']);
        $data['active'] = isset($request->active);
        User::create($data)->markEmailAsVerified();
        return redirect()->route('admin.user.list');  
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = $this->messages();
        $data = $request->validate([
            'name' => 'required|string|min:5|max:255',
            'user' => 'required|string|min:5|max:255',
            'email' => 'required|string|email|unique:users,email,' . $id,
            'password' => 'required|string|min:8',
        ], $messages);
        $user = User::findOrFail($id);
        if($user->password !== $request->password){
            $data['password'] = Hash::make($request['password']);
        }
        $data['active'] = isset($request->active);
        User::where('id', $id)->update($data);
       return redirect()->route('admin.user.list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    
    public function messages()
    {
        return[
            'name.min'=>'please enter your name min:5',
            'user.min'=>'please enter your name min:5',
            'email.unique'=>'this email is already exist',
            'password.required'=> 'min:8',
            ]; 
    }
}
