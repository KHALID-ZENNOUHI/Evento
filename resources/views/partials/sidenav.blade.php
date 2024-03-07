<!-- start of sidenav -->
<aside><div class="sidenav position-sticky d-flex flex-column justify-content-between">
    <a class="navbar-brand" href="/events" class="logo">
        <h1 class="text-white">Evento</h1>
    </a>
    <!-- end of navbar-brand -->

    <div class="navbar navbar-dark my-4 p-0 font-primary">
        <ul class="navbar-nav w-100">
            <li class="nav-item @@home">
                <a class="nav-link text-white px-0 pt-0" href="/">Home</a>
            </li>
            @if(!Auth::user())
            <li class="nav-item @@home">
                <a class="nav-link text-white px-0 pt-0" href="/login">Login</a>
            </li>
            @endif
            @auth
                @if(Auth::user()->role_id == '2')
                <li class="nav-item @@about">
                    <a class="nav-link text-white px-0" href="/events/create">Add Event</a>
                </li>
                <li class="nav-item @@contact">
                    <a class="nav-link text-white px-0" href="/organizer/events">Events Status</a>
                </li>
                @endif
                @if(Auth::user()->role_id == '1')
                <li class="nav-item @@Dashboard accordion">
                    <div id="drop-menu" class="drop-menu collapse">
                        <a class="d-block" href="#">Statistic</a>
                        <a class="d-block" href="/admin/events">Events</a>
                        <a class="d-block" href="/categories">Categories</a>
                        <a class="d-block" href="#"></a>
                    </div>
                    <a class="nav-link text-white" href="#!" role="button" data-toggle="collapse" data-target="#drop-menu" aria-expanded="false" aria-controls="drop-menu">Dashboard</a>
                </li>
                @endif
                <form method="POST"  action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            @endauth
            
            
        </ul>
    </div>
    <!-- end of navbar -->

    <ul class="list-inline nml-2">
        <li class="list-inline-item">
            <a href="#!" class="text-white text-red-onHover pr-2">
                <span class="fab fa-twitter"></span>
            </a>
        </li>
        <li class="list-inline-item">
            <a href="#!" class="text-white text-red-onHover p-2">
                <span class="fab fa-facebook-f"></span>
            </a>
        </li>
        <li class="list-inline-item">
            <a href="#!" class="text-white text-red-onHover p-2">
                <span class="fab fa-instagram"></span>
            </a>
        </li>
        <li class="list-inline-item">
            <a href="#!" class="text-white text-red-onHover p-2">
                <span class="fab fa-linkedin-in"></span>
            </a>
        </li>
    </ul>
    <!-- end of social-links -->
</div></aside>
<!-- end of sidenav -->