<header>
    <nav class="navbar navbar-expand-sm navbar-light bg-secondary">
        <div class="container">
            <a class="navbar-brand" href="https://www.youtube.com/watch?v=KH4w8tegvho">
                RPG Game
            </a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{Route::currentRouteName() === 'home' ? 'active' :''}}" href="{{ route('home') }}" aria-current="page">
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Route::currentRouteName() === 'guests.items.index' ? 'active' :''}}" href="{{ route('guests.items.index') }}">
                            Items
                        </a>
                    </li>
                </ul>
                <form class="d-flex my-2 my-lg-0">
                    <input class="form-control me-sm-2" type="text" placeholder="Find something.." />
                </form>
            </div>
        </div>
    </nav>
</header>
