<nav class="navbar navbar-expand-md navbar-light bg-white border-bottom sticky-top">
    <div class="container">
        <!-- Logo -->

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>



        <div class="collapse navbar-collapse container">
            <!-- Navbar navigation links -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('dashboard') }}"><i class="octicon octicon-home" aria-hidden="true"></i> Feed <span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('twits.index') }}"><i class="octicon octicon-person"></i> Profile </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="octicon octicon-zap"></i> Explore </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="octicon octicon-bell"></i> Notifications</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="octicon octicon-bookmark"></i> Bookmarks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://quickabdest.com/"><i class="octicon octicon-book"></i> Help Center </a>
                </li>

            </ul>

        </div>
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">

            <!-- Settings Dropdown -->
            @auth
                <x-dropdown id="settingsDropdown">
                    <x-slot name="trigger">
                        {{ Auth::user()->name }}
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                  this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            @endauth
        </ul>
    </div>
    </div>
</nav>
