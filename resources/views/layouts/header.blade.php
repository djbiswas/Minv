<!-- Page Content  -->
<div id="content">

    <!-- Navbar -->
    <nav class="navbar navbar-expand navbar-dark" id="main-nav" style="padding-bottom: 10px;">
        <div class="container-fluid">
            <button type="button" id="sidebarCollapse" class="btn btn-outline-light ml-3">
                <i class="fas fa-align-left"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item d-none">
                        <a class="nav-link" href="#">Page</a>
                    </li>
                    <li class="nav-item d-none">
                        <a class="nav-link" href="#">Page</a>
                    </li>
                    <li class="nav-item d-none">
                        <a class="btn btn-link text-dark d-block px-4 py-1 text-left w-100 text-decoration-none" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                            <i class="material-icons align-text-top mr-1">logout</i>
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                    <li class="nav-item dropdown user">
                        <a class="nav-link dropdown-toggle py-0 d-flex" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="user-name my-auto">{{ Auth::user()->name }}</span>
                            <div class="user-img rounded-circle d-inline-block"></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#"><i class="material-icons-outlined align-text-top mr-1">settings</i>Settings</a>
                            <div class="dropdown-divider"></div>
                            <a class="btn btn-link text-dark d-block px-4 py-1 text-left w-100 text-decoration-none" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                                <i class="material-icons align-text-top mr-1">logout</i>
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- End Navbar -->
    <div class="banner">
        <img src="/images/banner.jpg" alt="" width="100%">
    </div>

