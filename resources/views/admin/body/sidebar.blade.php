@php 
$prefix  = Request::route()->getPrefix();
$route = Route::current()->getName(); 

@endphp


<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
			<div class="ulogo">
				 <a href="{{route('admin.dashboard');}}">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">					 	
						  <img src="{{asset('backend/images/logo-dark.png')}}" alt="">
						  <h3><b>Sunny</b> Admin</h3>
					 </div>
				</a>
			</div>
        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
		  
		    <li class="{{($route == 'admin.dashboard')? 'active' : ''}}">
          <a href="{{route('admin.dashboard')}}">
            <i data-feather="pie-chart"></i>
			      <span>Dashboard</span>
          </a>
        </li>  
		
        <li class="treeview">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Brands</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{($route == 'all.brand')? 'active' : ''}}">
              <a href="{{route('all.brand')}}">
                <i class="ti-more"></i>All Brand
              </a>
            </li>
          </ul>
        </li> 
		  
        <li class="treeview" >
          <a href="#">
            <i data-feather="mail"></i> <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{($route == 'all.category')? 'active' : ''}}">
              <a href="{{route('all.category')}}">
                <i class="ti-more"></i>All Category
              </a>
            </li>
            
            <li class="{{($route == 'all.subcategory')? 'active' : ''}}">
              <a href="{{route('all.subcategory')}}">
                <i class="ti-more"></i>All SubCategory
              </a>
            </li>

            <li class="{{($route == 'all.subsubcategory')? 'active' : ''}}">
              <a href="{{route('all.subsubcategory')}}">
                <i class="ti-more"></i>All Sub-SubCategory
              </a>
            </li>
          </ul>
        </li>
		
        <li class="treeview {{($prefix == '/product')?'active': ''}}">
          <a href="#">
            <i data-feather="file"></i>
            <span>Product</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{($route == 'add.product')? 'active' : ''}}" ><a href="{{route('add.product')}}"><i class="ti-more"></i>Add Products</a></li>
            <li><a href="{{route('manage.product')}}"><i class="ti-more"></i>Manage Products</a></li>
          </ul>
        </li> 
        
        <li class="treeview {{($prefix == '/slider')?'active': ''}}">
          <a href="#">
            <i data-feather="file"></i>
            <span>Slider</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{($route == 'manage.slider')? 'active' : ''}}" ><a href="{{route('slider.view')}}"><i class="ti-more"></i>Manage Slider</a></li>
            
          </ul>
        </li> 		
		 





        <li class="header nav-small-cap">User Interface</li>
		  
        <li class="treeview">
          <a href="#">
            <i data-feather="grid"></i>
            <span>Components</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
            <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>
            <li><a href="components_buttons.html"><i class="ti-more"></i>Buttons</a></li>
            <li><a href="components_sliders.html"><i class="ti-more"></i>Sliders</a></li>
            <li><a href="components_dropdown.html"><i class="ti-more"></i>Dropdown</a></li>
            <li><a href="components_modals.html"><i class="ti-more"></i>Modal</a></li>
            <li><a href="components_nestable.html"><i class="ti-more"></i>Nestable</a></li>
            <li><a href="components_progress_bars.html"><i class="ti-more"></i>Progress Bars</a></li>
          </ul>
        </li>
		
		
		  
		    <li>
          <a href="{{route('admin.logout');}}">
            <i data-feather="lock"></i>
			          <span>Log Out</span>
          </a>
        </li> 
        
      </ul>
    </section>
	
	<div class="sidebar-footer">
		<!-- item-->
		<a href="#" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="#" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="{{route('admin.logout');}}" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
  </aside>