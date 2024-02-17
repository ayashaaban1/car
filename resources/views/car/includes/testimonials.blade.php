<div class="site-section {{ $color }}">
<div class="container">
        <div class="row">
          <div class="col-lg-7">
            <h2 class="section-heading"><strong>Testimonials</strong></h2>
            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>    
          </div>
        </div>
        <div class="row">
        @foreach($test as $row)
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="testimonial-2">
              <blockquote class="mb-4">
                <p>"{{ $row->content }}"</p>
              </blockquote>
              <div class="d-flex v-card align-items-center">
                <img src="{{ asset('assets/admin/img/'.$row->image) }}" alt="Image" class="img-fluid mr-3">
                <div class="author-name">
                  <span class="d-block">{{ $row->name }}</span>
                  <span >{{ $row->position }}</span>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>