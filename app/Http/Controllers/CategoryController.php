<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cate = Category::get();
        return view('admin.category.list', compact('cate'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = $this->messages();
        $data = $request->validate([
            'name'=>'required|min:5|max:50',
        ], $messages);
        Category::create($data);
        return redirect()->route('admin.category.list');
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
        $cate = Category::findOrFail($id);
        return view('admin.category.edit', compact('cate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = $this->messages();
        $data = $request->validate([
            'name'=>'required|min:5|max:50',
        ], $messages);
        Category::where('id', $id)->update($data);
        return redirect()->route('admin.category.list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cate = Category::with('car')->findOrFail($id);
        if($cate->car->count()>0){ 
            return back()->with('Error',"This Category is linked to car");
        } 
        Category::where('id', $id)->delete();
        return redirect()->back();
    }
    public function messages()
    {
        return[
            'name.min'=>'please enter your name min:5',
        ];
    }
}
