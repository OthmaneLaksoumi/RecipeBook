<header>
    <div class="container">
        <div class="logo">
            {{-- <img src="{{ asset('storage/logo.png') }}" alt=""> --}}
            <span>Recipes</span>
        </div>

        <div class="menu">
            <i class="fa-solid fa-bars" id="burgger"></i>
            <ul class="hidden" id="menu-list">
                <li><a class="active" href="{{ route('recipes.index') }}">Home</a></li>
                @auth
                    <li><a href="{{ route('recipes.myRecipes', auth()->user()) }}">My recipes</a></li>
                    <li><a href="{{ route('recipes.create') }}">Create Recipe</a></li>
                    <li><a href="{{ route('profile') }}">Profile: {{ auth()->user()->name }}</a></li>
                    <li><a href="{{ route('logout') }}">Logout</a></li>
                @endauth
                @guest
                    <li><a href="{{ route('login.show') }}">Login</a></li>
                    <li><a href="{{ route('sign_up') }}">Sign Up</a></li>
                @endguest
            </ul>
        </div>

        <nav>
            <ul>
                <li><a class="active" href="{{ route('recipes.index') }}">Home</a></li>
                @auth
                    <li><a href="{{ route('recipes.myRecipes', auth()->user()) }}">My recipes</a></li>
                    <li><a href="{{ route('recipes.create') }}">Create Recipe</a></li>
                @endauth
            </ul>
        </nav>
        <div class="buttons">
            @guest
                <a href="{{ route('login.show') }}">Login</a>
                <a href="{{ route('sign_up') }}">Sign Up</a>
            @endguest

            @auth
                <a href="{{ route('profile') }}"><i class="fa-solid fa-user"></i> &nbsp;{{ auth()->user()->name }}</a>
                <a href="{{ route('logout') }}">Logout</a>
            @endauth
        </div>



    </div>
</header>
