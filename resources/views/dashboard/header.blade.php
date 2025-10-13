 <!--begin::Header-->
 <nav class="app-header navbar navbar-expand bg-body">
     <!--begin::Container-->
     <div class="container-fluid">
         <!--begin::Start Navbar Links-->
         <ul class="navbar-nav">
             <li class="nav-item">
                 <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                     <i class="bi bi-list"></i>
                 </a>
             </li>
         </ul>
         <!--end::Start Navbar Links-->
         <!--begin::End Navbar Links-->
         <ul class="navbar-nav ms-auto">
             <!--begin::User Menu Dropdown-->
             <li class="nav-item dropdown user-menu">
                 <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <span class="d-none d-md-inline"> olá, <strong>{{ auth()->user()->name.' '.auth()->user()->sobrenome}} </strong> </span>
                 </a>
                 <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                     <!--begin::User Image-->
                     <li class="user-header text-bg-primary text-center">
                         <div
                             class="rounded-circle bg-white shadow mx-auto"
                             style="width: 80px; height: 80px;">
                         </div>
                         <p class="mt-2">
                             {{ auth()->user()->name.' '.auth()->user()->sobrenome }}
                         </p>
                     </li>
                     <!--end::User Image-->
                     <!--begin::Menu Footer-->
                     <li class="user-footer">
                         <a href="#" class="btn btn-default btn-flat">Profile</a>
                         <form action="{{ route('logout') }}" method="POST" class="btn btn-default btn-flat float-end">
                             @csrf
                             <button type="submit" style="border: none; background-color: white;">
                                 Logout
                             </button>
                         </form>
                     </li>
                     <!--end::Menu Footer-->
                 </ul>
             </li>
             <!--end::User Menu Dropdown-->
         </ul>
         <!--end::End Navbar Links-->
     </div>
     <!--end::Container-->
 </nav>
 <!--end::Header-->
