<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse sidebar-menu-background">
    <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link " href=" {{ route('home') }} ">
                    <span data-feather="home"></span>
                    Home 
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('profile') }}">
                    <span data-feather="user-check"></span>
                    Meu perfil
                </a>
            </li>
        </ul>

        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('url.index') }}">
                    <span data-feather="settings"></span>
                    Url
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('urlStatus.index') }}">
                    <span data-feather="settings"></span>
                    Status Url
                </a>
            </li>
        </ul>


        
    </div>
</nav>
