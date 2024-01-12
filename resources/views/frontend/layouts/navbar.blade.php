<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand logo-section" href="{{ route('home') }}"><img src="{{ asset('images/rezilla-logo.png ') }}" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        @php
        $buyPropertyTypes = App\Models\Property_Type::all();
       @endphp
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 main-menu">
                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Buy
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.2802 5.9668L8.93355 10.3135C8.42021 10.8268 7.58021 10.8268 7.06688 10.3135L2.72021 5.9668"
                                stroke="#292D32"
                                stroke-width="1.5"
                                stroke-miterlimit="10"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>
                    </a>
                    <ul class="dropdown-menu">
                        @foreach($buyPropertyTypes as $buyPropertyType)
                        <li><a class="dropdown-item" href="{{ route('listProperty',['id'=>encrypt($buyPropertyType->id)]) }}">{{ $buyPropertyType->name }}</a></li>
                        @endforeach
                        <li><a class="dropdown-item" href="#">View All</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Rent
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.2802 5.9668L8.93355 10.3135C8.42021 10.8268 7.58021 10.8268 7.06688 10.3135L2.72021 5.9668"
                                stroke="#292D32"
                                stroke-width="1.5"
                                stroke-miterlimit="10"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>
                    </a>
                    <ul class="dropdown-menu">
                        @foreach($buyPropertyTypes as $buyPropertyType)
                        <li><a class="dropdown-item" href="{{ route('listProperty',['id'=>encrypt($buyPropertyType->id)]) }}">{{ $buyPropertyType->name }}</a></li>
                        @endforeach
                        <li><a class="dropdown-item" href="#">View All</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Communities
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.2802 5.9668L8.93355 10.3135C8.42021 10.8268 7.58021 10.8268 7.06688 10.3135L2.72021 5.9668"
                                stroke="#292D32"
                                stroke-width="1.5"
                                stroke-miterlimit="10"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Dubai Marina</a></li>
                        <li><a class="dropdown-item" href="#">Downtown Dubai</a></li>
                        <li><a class="dropdown-item" href="#">Palm Jumeirah</a></li>
                        <li><a class="dropdown-item" href="#">Dubai Land</a></li>
                        <li><a class="dropdown-item" href="#">City Walk Dubai</a></li>
                        <li><a class="dropdown-item" href="#">DIFC</a></li>
                        <li><a class="dropdown-item" href="#">View All</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Services
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.2802 5.9668L8.93355 10.3135C8.42021 10.8268 7.58021 10.8268 7.06688 10.3135L2.72021 5.9668"
                                stroke="#292D32"
                                stroke-width="1.5"
                                stroke-miterlimit="10"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('getAsset') }}">Asset Management</a></li>
                        <li><a class="dropdown-item" href="{{ route('getHolidayHomes') }}">Holiday Homes</a></li>
                        <li><a class="dropdown-item" href="{{ route('getCommercial') }}">Commercial</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        @php
        $userId = session('user_id');
        $user = App\Models\User::find($userId);
       @endphp

        @if(!session()->has('user_id'))
        <div class="login-register">
            <div class="login-register-inner">
                <a href="{{ route('loginpage') }}">
                    <i class="fa-regular fa-circle-user"></i>
                    Login/Register
                </a>
            </div>
        </div>
        @else
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 main-menu">
            <li class="nav-item dropdown">
                <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-regular fa-circle-user"></i>
                    {{ $user->name }}
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M13.2802 5.9668L8.93355 10.3135C8.42021 10.8268 7.58021 10.8268 7.06688 10.3135L2.72021 5.9668"
                            stroke="#292D32"
                            stroke-width="1.5"
                            stroke-miterlimit="10"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                    </svg>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('user_profile') }}">Profile</a></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}">Log Out</a></li>
                </ul>
            </li>
        </ul>

        @endif
    </div>
</nav>
