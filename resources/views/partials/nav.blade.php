<div class="d-flex justify-content-around mt-2">
<div>
    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
</div>
    
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                @endif
            @endauth
        </div>
    @endif
    </div>

<div class="d-flex justify-content-around ">
    


    <a href="accueil"><h5>
        Accueil
    </h5></a>
    <a href="testimonials">
    <h5>
        Testimonials
    </h5>
    </a>
</div>