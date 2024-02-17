<?php 
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
 ?>

<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <div class="d-flex align-items-center justify-content-center">
                    <h3>Admin</h3>
                </div>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="{{ ($route == 'dashboard')?'active':'' }}">
                <a href="{{ url('admin/dashboard') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>

              @php
            $user = auth()->guard('admin')->user();
            if($user){
                $category = (auth()->guard('admin')->user()->category == 1);
                $product = (auth()->guard('admin')->user()->product == 1);
                $blog = (auth()->guard('admin')->user()->blog == 1);
                $setting = (auth()->guard('admin')->user()->setting == 1);
                $page = (auth()->guard('admin')->user()->page == 1);
                $role = (auth()->guard('admin')->user()->role == 1);
            }else{
                return redirect()->route('admin.login');
            }
            
            @endphp
            @if($category == true)
             <li class="treeview {{ ($prefix == '/category')?'active':'' }}">
                <a href="#">
                    <i data-feather="mail"></i> <span>Danh mục</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'all.category')?'active':'' }}"><a href="{{ route('all.category') }}"><i class="ti-more"></i>Danh mục cha</a>
                    </li>
                    <li class="{{ ($route == 'all.subcategory')? 'active':'' }}"><a href="{{ route('all.category') }}"><a href="{{ route('all.subcategory') }}"><i class="ti-more"></i>Danh mục con</a>
                    </li>
                    
                </ul>
            </li>
            @else
            @endif
             @if($product == true)
             <li class="treeview {{ ($prefix == '/product')?'active':'' }}">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>Sản phẩm</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'manage-product')? 'active':'' }}"><a href="{{ route('manage-product') }}"><i class="ti-more"></i>Danh sách sản phẩm</a>
                    </li>
                    <li class="{{ ($route == 'add-product')? 'active':'' }}"><a href="{{ route('add-product') }}"><i class="ti-more"></i>Thêm sản phẩm</a>
                    </li>
                   
                </ul>
            </li>
            @else
            @endif
         @if($blog == true)   
        <li class="treeview {{ ($prefix == '/blog')?'active':'' }}">
            <a href="#">
                <i data-feather="message-circle"></i>
                <span>Blog</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ ($route == 'blog.category')? 'active':'' }}"><a href="{{ route('blog.category') }}"><i class="ti-more"></i>Chuyên mục</a>
                </li>
                 

                <li class="{{ ($route == 'list.post')? 'active':'' }}"><a href="{{ route('list.post') }}"><i class="ti-more"></i>Danh sách bài viết</a>
                </li>
                <li class="{{ ($route == 'add.post')? 'active':'' }}"><a href="{{ route('add.post') }}"><i class="ti-more"></i>Thêm bài viết</a>
                </li>
            </ul>
        </li>
        @else
        @endif

        @if($page == true)   
        <li class="treeview">
            <a href="#">
                <i data-feather="message-circle"></i>
                <span>Pages</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class=""><a href=""><i class="ti-more"></i>Thêm trang</a>
                </li>
                 

                <li class=""><a href=""><i class="ti-more"></i>Danh sách trang</a>
                </li>
                
            </ul>
        </li>
        @else
        @endif

          @if($setting == true)  
        <li class="{{ ($prefix == '/setting')?'active':'' }}  ">
           <a href="{{ route('site.setting') }}"><i class="ti-more"></i>Site Setting</a>
        </li>
        @else
        @endif
        @if($role == true)
        <li class="treeview">
            <a href="#">
                <i data-feather="file"></i>
                <span>User</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ ($route == 'create.admin')? 'active':'' }}"><a href="{{ route('create.admin') }}"><i class="ti-more"></i>Tạo user</a></li>

                <li class="{{ ($route == 'admin.all.user')? 'active':'' }}"><a href="{{ route('admin.all.user') }}"><i class="ti-more"></i>All user</a></li>
            </ul>
        </li>
        @else
        @endif



            <li>
                <a href="{{ route ('admin.logout') }}">
                    <i data-feather="lock"></i>
                    <span>Đăng xuất</span>
                </a>
            </li>

        </ul>
    </section>

  
</aside>