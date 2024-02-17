<div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      <img src="{{ asset('assets/admin/images/img.jpg') }}" alt="">{{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item"  href="javascript:;"> Profile</a>
                        <a class="dropdown-item"  href="javascript:;">
                          <span class="badge bg-red pull-right">50%</span>
                          <span>Settings</span>
                        </a>
                    <a class="dropdown-item"  href="javascript:;">Help</a>
                      <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                    </div>
                  </li>
  
                  <li role="presentation" class="nav-item dropdown open">
                    <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-envelope-o"></i>
                      <span class="badge bg-green">{{count($message )}}</span>
                    </a>
                    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">

                    @foreach( $message as $k)  
                      <li class="nav-item">
                        <a class="dropdown-item" href = "{{ route('admin.contact.show',[$k->id]) }}">
                          <span class="image"><img src="{{ asset('assets/admin/images/img.jpg') }}" alt="Profile Image" /></span>
                          <span>
                            <span>{{$k->firstname}}{{$k->lastname}}</span>
                            <span class="time">{{ $k->created_at->diffForHumans() }}</span>
                          </span>
                          <span class="message">
                          {{substr($k->message, 0, 50)}}
                          </span>
                        </a>
                      </li>
                      @endforeach
                      <li class="nav-item">
                        <div class="text-center">
                          <a class="dropdown-item">
                            <strong><a href ="{{ route('admin.contact.list') }}">See All Alerts</a></strong>
                            <i class="fa fa-angle-right"></i>
                          </a>
                        </div>
                      </li>
                    </ul>
                  </li>
                </ul>
              </nav>
            </div>
          </div>