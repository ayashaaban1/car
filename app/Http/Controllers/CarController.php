<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Traits\Common;
use App\Models\Category;

class CarController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $car = Car::get();
        return view('admin.cars.list', compact('car'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cate = Category::get();
        return view('admin.cars.add', compact('cate'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = $this->messages();
        $data = $request->validate([
            'title'=>'required|min:5|max:50',
            'content'=>'required|string|max:500',
            'luggage'=>'required|integer',
            'doors'=>'required|integer',
            'passengers'=>'required|integer',
            'price'=>'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'category_id'=>'required',
        ], $messages);
        $data['image'] = $this->uploadFile($request->image, 'assets/admin/img');    
        $data['active'] = isset($request->active);
         Car::create($data);
        return redirect()->route('admin.car.list');
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
        $car = Car::findOrFail($id);
        $cate = Category::get();
        return view('admin.cars.edit', compact('car','cate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = $this->messages();
        $data = $request->validate([
            'title'=>'required|min:5|max:50',
            'content'=>'required|string|max:500',
            'luggage'=>'required|integer',
            'doors'=>'required|integer',
            'passengers'=>'required|integer',
            'price'=>'required',
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
            'category_id'=>'required',
        ], $messages);
        $car =  Car::findOrFail($id);
        if($request->hasFile('image')){
            $data['image'] = $this->uploadFile($request->image, 'assets/admin/img');    
            unlink("assets/admin/img/" . $car->image);
        }
        $data['active'] = isset($request->active);
        Car::where('id', $id)->update($data);
        return redirect()->route('admin.car.list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $car = Car::findOrFail($id);
        unlink("assets/admin/img/" . $car->image);
        Car::where('id', $id)->delete();
        return redirect()->back();
    }
    public function messages()
    {
        return[
            'title.min'=>'please enter title min:5',
            'content.required'=> 'should be text',
            'luggage.integer'=> 'should be integer',
            'doors.integer'=> 'should be integer',
            'passengers.integer'=> 'should be integer',
            'image.required'=> 'Please be sure to select an image',
            'image.mimes'=> 'Incorrect image type',
            'image.max'=> 'Max file size exceeded',
            ]; 
    }
}
