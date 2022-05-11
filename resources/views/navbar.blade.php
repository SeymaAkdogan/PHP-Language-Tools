<nav class="navbar navbar-expand-lg navbar-dark bg-transparent mx-0">
    <div class="container-fluid">
        <ul class="navbar-nav ms-auto mb-md-0">
            @auth
            <li class="nav-item">
                <a class="nav-link text-white" href="/logout">Logout, {{ Auth::user()->username }} <i class="fas fa-sign-out"></i></a>
            </li>
            @endauth

            @guest
            <li class="nav-item">
                <a class="nav-link text-white" href="/login">Login <i class="fas fa-user"></i></a>
            </li>
            @endguest
        </ul>
    </div>
</nav>
