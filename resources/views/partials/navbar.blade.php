<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            AppArte
        </a>

        @if (Auth::check())

        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="/images/logoUser.jpg" class="rounded-circle" width="30" height="30"/>
                <span class="hidden-xs">{!! Auth::user()->name !!}</span>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                <a class="dropdown-item" href="{{ url('/users/'.Auth::id().'/edit') }}">Editar mis datos</a>
                <form action="{{ route('logout') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="dropdown-item">Cerrar sesión</button>
                </form>
            </div>
        </div>
        @endif

    </div>
</nav>
