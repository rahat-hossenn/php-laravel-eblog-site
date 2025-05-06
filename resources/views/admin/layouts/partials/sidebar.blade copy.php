<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{route('home')}}" class="brand-link text-center">
    <span class="brand-text font-weight-light">Blog CPanel</span>
    </a>
    <div class="sidebar">
       <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
             <li class="nav-item">
                <a href="{{route('home')}}" class="nav-link">
                   <i class="nav-icon fas fa-th"></i>
                   <p>
                         Dashboard
                   </p>
                </a>
             </li>
             <li class="nav-item menu-open">
                <a href="" class="nav-link">
                   <i class="nav-icon fas fa-tachometer-alt"></i>
                   <p>
                      Blog
                      <i class="right fas fa-angle-left"></i>
                   </p>
                </a>
                <ul class="nav nav-treeview">
                   <li class="nav-item">
                      <a href="{{route('admin.blogs')}}" class="nav-link">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Post List</p>
                      </a>
                   </li>
                   <li class="nav-item">
                      <a href="{{route('admin.blog.create')}}" class="nav-link">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Add New Post</p>
                      </a>
                   </li>
                </ul>
             </li>
             <li class="nav-item">
                <a href="3" class="nav-link">
                   <i class="nav-icon fas fa-tachometer-alt"></i>
                   <p>
                      Category
                      <i class="right fas fa-angle-left"></i>
                   </p>
                </a>
                <ul class="nav nav-treeview">
                   <li class="nav-item">
                      <a href="{{route('admin.categorys')}}" class="nav-link">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Category List</p>
                      </a>
                   </li>
                   <li class="nav-item">
                      <a href="{{route('admin.category.crate')}}" class="nav-link">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Add Category</p>
                      </a>
                   </li>
                </ul>
             </li>
             <li class="nav-item">
                       <a href="#" class="nav-link">
                           <i class="nav-icon fas fa-tachometer-alt"></i>
                           <p>
                               Pages
                               <i class="right fas fa-angle-left"></i>
                           </p>
                       </a>
                       <ul class="nav nav-treeview">
                           <li class="nav-item">
                               <a href="{{route('admin.privacy')}}" class="nav-link">
                                   <i class="far fa-circle nav-icon"></i>
                                   <p>Privacy Policy</p>
                               </a>
                           </li>
                           <li class="nav-item">
                               <a href="{{route('admin.terms')}}" class="nav-link ">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Terms & Conditions</p>
                               </a>
                            </li>
                       </ul>
                   </li>
                   <li class="nav-item">
                       <a href="#" class="nav-link">
                           <i class="nav-icon fas fa-tachometer-alt"></i>
                           <p>
                               Role & Permissions
                               <i class="right fas fa-angle-left"></i>
                           </p>
                       </a>
                       <ul class="nav nav-treeview">
                        <li class="nav-item">
                              <a href="{{route('admin.users.index')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Admin List</p>
                              </a>
                          </li>
                          <li class="nav-item">
                                <a href="{{route('admin.user_role')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Users Role</p>
                                </a>
                            </li>
                           {{-- <li class="nav-item">
                               <a href="{{route('admin.system_user')}}" class="nav-link">
                                   <i class="far fa-circle nav-icon"></i>
                                   <p>System Users</p>
                               </a>
                           </li> --}}
                       </ul>
                   </li>
                   <li class="nav-item">
                      <a href="{{route('admin.setting')}}" class="nav-link">
                         <i class="nav-icon fas fa-th"></i>
                         <p>
                            Web Setting
                            <span class="right badge badge-danger">New</span>
                         </p>
                      </a>
                   </li>
                   <li class="nav-item">
                     <a href="{{route('admin.contacs.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-address-book"></i>
                        <p>
                           Contact
                           <span class="right badge badge-danger">New</span>
                        </p>
                     </a>
                  </li> 
                  <li class="nav-item">
                     <a href="{{route('admin.add.index')}}" class="nav-link">
                         <i class="nav-icon fas fa-bullhorn"></i>
                         <p>
                             Advertisement
                         </p>
                     </a>
                 </li> 
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