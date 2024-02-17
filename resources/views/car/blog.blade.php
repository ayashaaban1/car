@extends("car.layouts.Pages",["title"=>"Blog"])
@section("content")
@include("car.includes.slider",["Value"=>"Blog"])
@include("car.includes.blog")
@include("car.includes.whatwaiting")
@endsection