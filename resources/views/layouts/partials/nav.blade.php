<nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary">
    <a
        class="navbar-brand"
        href="{{ route('pet.index') }}"
    >
        <img
            src="{{ asset('images/uchase.png') }}"
            width="120"
            height="40"
            alt=""
        >
    </a>
    <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
    >
        <span class="navbar-toggler-icon"></span>
    </button>

    <div
        class="collapse navbar-collapse"
        id="navbarSupportedContent"
    >
        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ request()->route()->getName() === 'pet.index' ? 'active' : '' }}">
                <a
                    class="nav-link"
                    href="{{ route('pet.index') }}"
                >Търсене на домашен любимец</a>
            </li>
            <li class="nav-item {{ request()->route()->getName() === 'pet.create' ? 'active' : '' }}">
                <a
                    class="nav-link"
                    href="{{ route('pet.create') }}"
                >Добави домашен любимец</a>
            </li>
        </ul>
    </div>
</nav>
