@extends("car.layouts.Pages",["title"=>"Testimonials"])
@section("content")
  @include("car.includes.slider",["Value"=>"Testimonials"])
  @include("car.includes.testimonials",["color" => "bg-light"])
  @include("car.includes.whatwaiting")
@endsection