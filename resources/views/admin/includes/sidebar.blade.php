<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
						<div class="menu_section">
							<h3>General</h3>
							<ul class="nav side-menu">
								<li><a><i class="fa fa-users"></i> Users <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="{{ route('admin.user.list') }}">Users List</a></li>
										<li><a href="{{ route('admin.user.create') }}">Add User</a></li>
									</ul>
								</li>
								<li><a><i class="fa fa-edit"></i> Categories <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="{{ route('admin.category.create') }}">Add Category</a></li>
										<li><a href="{{ route('admin.category.list') }}">Categories List</a></li>
									</ul>
								</li>
								<li><a><i class="fa fa-desktop"></i> Cars <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="{{ route('admin.car.create') }}">Add Car</a></li>
										<li><a href="{{ route('admin.car.list') }}">Cars List</a></li>
									</ul>
								</li>
                <li><a><i class="fa fa-desktop"></i> Testimonials <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="{{ route('admin.testimonial.create') }}">Add Testimonials</a></li>
										<li><a href="{{ route('admin.testimonial.list') }}">Testimonials List</a></li>
									</ul>
								</li>
                <li><a><i class="fa fa-desktop"></i> Messages <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="{{ route('admin.contact.list') }}">Messages</a></li>
									</ul>
								</li>
							</ul>
						</div>

					</div>