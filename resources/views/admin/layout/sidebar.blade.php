       <!--start sidebar -->
       <aside class="sidebar-wrapper" data-simplebar="true">
        <div class="sidebar-header">
          <div>
            <img src="{{ asset('admin/assets/images/logo-icon-2.png')}}" class="logo-icon" alt="logo icon">
          </div>
          <div>
            <h4 class="logo-text">Blogger</h4>
          </div>
          <div class="toggle-icon ms-auto"><ion-icon name="menu-sharp"></ion-icon>
          </div>
        </div>
        <!--navigation-->
        <ul class="metismenu" id="menu">
          <li>
            <a href="{{ route('dashboard') }}">
              <div class="parent-icon"><ion-icon name="home-sharp"></ion-icon>
              </div>
              <div class="menu-title">Dashboard</div>
            </a>
          </li>

          @can('user_view')
          <li>
            <a href="{{route('users')}}">
              <div class="parent-icon"><ion-icon name="bag-handle-sharp"></ion-icon>
              </div>
              <div class="menu-title">Users</div>
            </a>
          </li>
          @endcan

          <li>
            <a href="javascript:;" class="has-arrow">
              <div class="parent-icon"><ion-icon name="bag-handle-sharp"></ion-icon>
              </div>
              <div class="menu-title">Blog Details</div>
            </a>
            <ul>
            @can('category_view')
            <li> <a href="{{ route('categories') }}"><ion-icon name="ellipse-outline"></ion-icon>Categories</a></li>
            @endcan
            <!-- @can('post_view')
            <li> <a href="{{ route('products') }}"><ion-icon name="ellipse-outline"></ion-icon>Products</a></li>  
            @endcan -->

            @can('post_view')
            <li> <a href="{{ route('posts') }}"><ion-icon name="ellipse-outline"></ion-icon>Posts</a></li>  
            @endcan

            </ul>
          </li>
          @can('permission_view')
          <li>
            <a href="javascript:;" class="has-arrow">
              <div class="parent-icon"><ion-icon name="bag-handle-sharp"></ion-icon>
              </div>
              <div class="menu-title">Access Handlig</div>
            </a>
            <ul>
              @can('permission_view')
              <li><a href="{{ route('permissions') }}"><ion-icon name="ellipse-outline"></ion-icon>Permissions</a></li>
              @endcan
              @can('role_view')
              <li><a href="{{ route('roles') }}"><ion-icon name="ellipse-outline"></ion-icon>Roles</a>
              </li>
              @endcan
              </li>
              @endcan
            </ul>
          </li>
        </ul>
        <!--end navigation-->
     </aside>
     <!--end sidebar -->