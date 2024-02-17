<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Car;
use App\Models\Testimonial;

class MainController extends Controller
{
    public function index()
    {
        $test =Testimonial::where('published',1)->latest()->take(3)->get();
        $car =Car::where('active',1)->latest()->take(6)->get();
        return view("car.index",compact('car', 'test'));
    }
    public function listing()
    {
        $car =Car::where('active',1)->latest()->paginate(6);
        $test =Testimonial::where('published',1)->latest()->take(3)->get();
        return view("car.listing",compact('car', 'test'));
    }
    public function testimonials()
    {
        $test =Testimonial::where('published',1)->latest()->get();
        return view("car.testimonials",compact('test'));
    }
    public function blog()
    {
        return view("car.blog");
    }
    public function about()
    {
        return view("car.about");
    }
    public function contact()
    {
        return view("car.contact");
    }
    public function single(string $id)
    {
        $car = Car::findOrFail($id);
        $cat = Category::wherehas('car')->get();
        return view("car.single",compact('car', 'cat'));
    }
    public function __invoke()
    {
        return view('car.404');
    }
}
