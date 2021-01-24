<header class="header">
    <div class="container">
        <div class="header__main">
            <div class="header__burger">
                <span></span>
            </div>
            <div class="header__logo">
                <a href="#"><img src="img/header-logo.png" alt="logo"></a>
            </div>
            <div class="header__nav">
                <ul>
                    <li class="header__nav--li"><a href="#" class="header__nav--link">Bay & Sells</a></li>
                    <li class="header__nav--li"><a href="#" class="header__nav--link">Motorcycle</a></li>
                    <li class="header__nav--li"><a href="#" class="header__nav--link">Car</a></li>
                    <li class="header__nav--li"><a href="#" class="header__nav--link">Camping</a></li>
                    <li class="header__nav--li"><a href="#" class="header__nav--link">Water Sport</a></li>
                    <li class="header__nav--li"><a href="#" class="header__nav--link">Bicycle</a></li>
                </ul>
            </div>
            <div class="header__button">
                @guest
                <a href="{{ route('login') }}">{{ __('Login') }}</a>
                @if (Route::has('register'))
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
                @else
                    <a  href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endguest

            </div>
            <div class="header__add--mob">
                <a href="#"><img src="img/mobile-add.svg" alt="add"></a>
            </div>
            <div class="header__mobile">
                <div class="header__nav--mob">
                    <ul>
                        <li class="header__nav--li"><a href="#" class="header__nav--link">Bay & Sells</a></li>
                        <li class="header__nav--li"><a href="#" class="header__nav--link">Car Deteiling</a></li>
                        <li class="header__nav--li"><a href="#" class="header__nav--link">Moto Setings</a></li>
                        <li class="header__nav--li"><a href="#" class="header__nav--link">Bike Services</a></li>
                        <li class="header__nav--li"><a href="#" class="header__nav--link">Camping</a></li>
                    </ul>
                </div>
                <div class="header__btn--mob">
                    <button>Sign in</button>
                    <button>Sign Up</button>
                    <button href="#">EN</button>

                </div>
            </div>
        </div>
    </div>
</header>
