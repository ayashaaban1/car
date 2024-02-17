<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contact = Contact::get();
        return view('admin.contact.list', compact('contact'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'firstname'=>'required|min:5|max:50',
            'lastname'=>'required|min:5|max:50',
            'email' => 'required|email',
            'message'=> 'required|min:20|max:300',
        ]);
        Contact::create($data);
        Mail::to('as3957401@gmail.com')->send(new ContactMail($data));
        return redirect()->back()->with('success', 'Email sent successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Contact::where('id', $id)->update(['unread' => 1]);
        $contact = Contact::findOrFail($id);
        return view('admin.contact.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Contact::where('id', $id)->delete();
        return redirect()->back();
    }
}
