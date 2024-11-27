
@if(Auth::check() && Auth::user()->is_admin)
    <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-lg" style="background: linear-gradient(315deg, #1f1f1f, #000000);">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'My_Profile') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('education*') ? 'text-primary' : 'text-white' }}" href="{{ route('education.index') }}">EDUCATION</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('projects*') ? 'text-primary' : 'text-white' }}" href="{{route('projects.index')}}">PROJECTS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('work_experiences*') ? 'text-primary' : 'text-white' }}" href="{{route('work_experiences.index')}}">WORK_EXPERIENCE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('resume.index*') ? 'text-primary' : 'text-white' }}" href="{{route('resume.index')}}">RESUME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('users*') ? 'text-primary' : 'text-white' }}" href="{{route('users.index')}}">USERS</a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">{{ Auth::user()->name }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('logout') }}"onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
@else
    <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-lg" style="background: linear-gradient(315deg, #1f1f1f, #000000);">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'My_Profile') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('education*') ? 'text-primary' : 'text-white' }}" href="{{ route('education.index') }}">EDUCATION</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('projects*') ? 'text-primary' : 'text-white' }}" href="{{route('projects.index')}}">PROJECTS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('work_experiences*') ? 'text-primary' : 'text-white' }}" href="{{route('work_experiences.index')}}">WORK_EXPERIENCE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('resume.index*') ? 'text-primary' : 'text-white' }}" href="{{route('resume.index')}}">RESUME</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
@endif

