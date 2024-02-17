@extends("car.layouts.Pages",["title"=>"Listings"])
@section("content")
@include("car.includes.slider",["Value"=>"Listings"])
  @include("car.includes.carlisting")
  <div class="row">
          <div class="col-5">
            <div class="custom-pagination">
              <span>{{$car->links('vendor.pagination.default')}}</span>
            </div>
          </div>
        </div>
      </div>
    </div>

  @include("car.includes.testimonials",["color" => ""])
  @include("car.includes.whatwaiting")
@endsection
  