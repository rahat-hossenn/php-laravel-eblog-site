<aside class="main-sidebar sidebar-dark-primary elevation-4">
   <a href="{{route('home')}}" class="brand-link text-center">
       <span class="brand-text font-weight-light">Blog CPanel</span>
   </a>
   <div class="sidebar">
       <nav class="mt-2">
           <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
               
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-th"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            

              {{-- Blog --}}
            @canany(['admin.blog-post.view', 'admin.blog-post.create'])
            @php
                $blogActive = request()->routeIs('admin.blogs', 'admin.blog.create');
            @endphp
            <li class="nav-item {{ $blogActive ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ $blogActive ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Blog <i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    @can('admin.blog-post.view')
                    <li class="nav-item">
                        <a href="{{route('admin.blogs')}}" class="nav-link {{ request()->routeIs('admin.blogs') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Post List</p>
                        </a>
                    </li>
                    @endcan

                    @can('admin.blog-post.create')
                    <li class="nav-item">
                        <a href="{{route('admin.blog.create')}}" class="nav-link {{ request()->routeIs('admin.blog.create') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add New Post</p>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcanany


                {{-- Category --}}
            @canany(['admin.blog-category.view', 'admin.blog-category.create'])
            @php
                $categoryActive = request()->routeIs('admin.categorys', 'admin.category.crate');
            @endphp
            <li class="nav-item {{ $categoryActive ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ $categoryActive ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Category <i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    @can('admin.blog-category.view')
                    <li class="nav-item">
                        <a href="{{route('admin.categorys')}}" class="nav-link {{ request()->routeIs('admin.categorys') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Category List</p>
                        </a>
                    </li>
                    @endcan

                    @can('admin.blog-category.create')
                    <li class="nav-item">
                        <a href="{{route('admin.category.crate')}}" class="nav-link {{ request()->routeIs('admin.category.crate') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add Category</p>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcanany


              {{-- Pages --}}
            @canany(['admin.privacy.edit', 'admin.terms.edit'])
            @php
                $pagesActive = request()->routeIs('admin.privacy', 'admin.terms');
            @endphp
            <li class="nav-item {{ $pagesActive ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ $pagesActive ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Pages <i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    @can('admin.privacy.edit')
                    <li class="nav-item">
                        <a href="{{route('admin.privacy')}}" class="nav-link {{ request()->routeIs('admin.privacy') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Privacy Policy</p>
                        </a>
                    </li>
                    @endcan

                    @can('admin.terms.edit')
                    <li class="nav-item">
                        <a href="{{route('admin.terms')}}" class="nav-link {{ request()->routeIs('admin.terms') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Terms & Conditions</p>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcanany


             {{-- Role & Permission --}}
            @canany(['admin.user.view', 'admin.user_role'])
            @php
                $rolePermissionActive = request()->routeIs('admin.users.index', 'admin.user_role');
            @endphp
            <li class="nav-item {{ $rolePermissionActive ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ $rolePermissionActive ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Role & Permissions <i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    @can('admin.user.view')
                    <li class="nav-item">
                        <a href="{{route('admin.users.index')}}" class="nav-link {{ request()->routeIs('admin.users.index') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Admin List</p>
                        </a>
                    </li>
                    @endcan

                    @can('admin.user_role')
                    <li class="nav-item">
                        <a href="{{route('admin.user_role')}}" class="nav-link {{ request()->routeIs('admin.user_role') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Users Role</p>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcanany

            {{-- Settings --}}
            @can('admin.settings.edit')
            @php
                $settingsActive = request()->routeIs('admin.setting');
            @endphp
            <li class="nav-item {{ $settingsActive ? 'menu-open' : '' }}">
                <a href="{{route('admin.setting')}}" class="nav-link {{ $settingsActive ? 'active' : '' }}">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Web Setting
                        <span class="right badge badge-danger">New</span>
                    </p>
                </a>
            </li>
            @endcan


                            {{-- Contact --}}
                @can('admin.contacs.view')
                @php
                    $contactActive = request()->routeIs('admin.contacs.index');
                @endphp
                <li class="nav-item">
                    <a href="{{route('admin.contacs.index')}}" class="nav-link {{ $contactActive ? 'active' : '' }}">
                        <i class="nav-icon fas fa-address-book"></i>
                        <p>Contact <span class="right badge badge-danger">New</span></p>
                    </a>
                </li>
                @endcan

                {{-- Advertisement --}}
                @can('admin.advertisement.edit')
                @php
                    $advertisementActive = request()->routeIs('admin.add.index');
                @endphp
                <li class="nav-item">
                    <a href="{{route('admin.add.index')}}" class="nav-link {{ $advertisementActive ? 'active' : '' }}">
                        <i class="nav-icon fas fa-bullhorn"></i>
                        <p>Advertisement</p>
                    </a>
                </li>
                @endcan

                {{-- Logout --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" 
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>


           </ul>
       </nav>
   </div>
</aside>
