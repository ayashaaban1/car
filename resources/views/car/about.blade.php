@extends("car.layouts.Pages",["title"=>"About"])
@section("content")
@include("car.includes.slider",["Value"=>"About"])
@include("car.includes.about")
@include("car.includes.whatwaiting")
@endsection