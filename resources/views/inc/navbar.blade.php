{{-- <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">Just Another Blog</h5>
    <nav class="my-2 my-md-0 mr-md-3">
      

    </nav>

    <a class="btn btn-outline-primary" href="posts/create">Create Post</a>
    
</div> --}}

<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
        <h5 class="my-2 mr-md-auto font-weight-normal">            
            <a class="navbar-brand text-dark" href="https://github.com/AbdulrahmanGameel/basicBlog">
                {{ config('app.name', 'Laravel') }}
            </a>
        </h5>
        <nav class="my-2 my-md-0 mr-md-3">
                <a class="p-2 text-dark" href="/">Home</a>
                <a class="p-2 text-dark" href="/about">About</a>
                <a class="p-2 text-dark" href="/services">Services</a>
                <a class="p-2 text-dark" href="/posts">Blog</a>
        </nav>

        @guest

            <a class="btn btn-secondary" href="{{ route('login') }}">{{ __('Login') }}</a>

        @if (Route::has('register'))
                <a class="btn btn-outline-dark" href="{{ route('register') }}">{{ __('Register') }}</a>

        @endif
    @else
        <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
            </a>
          
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="home">Dashboard</a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>  
            
        
    @endguest
      </div>