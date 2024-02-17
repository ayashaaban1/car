<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Traits\Common;

class TestimonialController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::get();
        return view('admin.testimonial.list', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimonial.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = $this->messages();
        $data = $request->validate([
            'name'=>'required|min:5|max:50',
            'position'=>'required|max:50',
            'content'=>'required|string',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ], $messages);
        $data['image'] = $this->uploadFile($request->image, 'assets/admin/img');    
        $data['published'] = isset($request->published);
        Testimonial::create($data);
        return redirect()->route('admin.testimonial.list');
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
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonial.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = $this->messages();
        $data = $request->validate([
            'name'=>'required|min:5|max:50',
            'position'=>'required|max:50',
            'content'=>'required|string',
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
        ], $messages);
        $testimonial = Testimonial::findOrFail($id);
        if($request->hasFile('image')){
            $data['image'] = $this->uploadFile($request->image, 'assets/admin/img');    
            unlink("assets/admin/img/" . $testimonial->image);
        }
        $data['published'] = isset($request->published);
        Testimonial::where('id', $id)->update($data);
        return redirect()->route('admin.testimonial.list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        unlink("assets/admin/img/" . $testimonial->image);
        Testimonial::where('id', $id)->delete();
        return redirect()->back();
    }
    public function messages()
    {
        return[
            'name.min'=>'please enter your name min:5',
            'position.string'=>'Should be string',
            'content.required'=> 'should be text',
            'image.required'=> 'Please be sure to select an image',
            'image.mimes'=> 'Incorrect image type',
            'image.max'=> 'Max file size exceeded',
            ]; 
    }
}
