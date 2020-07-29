<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'End-Project') }}
        </a>
        @foreach($links['left'] ?? [] as $link)
            <a class="nav-link" href="{{$link['url']}}">{{$link['display']}}</a>
        @endforeach
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @foreach($links['right'] ?? [] as $link)
                    <a class="nav-link" href="{{$link['url']}}">{{$link['display']}}</a>
            @endforeach
            <!-- Dropdown Menu -->
                <li class="nav-item dropdown">
                    @if(isset($links['dropdown'][0]))
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                    @endif

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                        @foreach($links['dropdown'] ?? [] as $link)
                            @if($link['url'] === route('logout'))
                                <a class="dropdown-item" href="{{$link['url']}}"
                                   onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                                    {{$link['display']}}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            @else
                                <a class="nav-link" href="{{$link['url']}}">{{$link['display']}}</a>
                            @endif
                        @endforeach
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
