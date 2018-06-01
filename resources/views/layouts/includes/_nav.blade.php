<nav class="bg-white h-12 shadow mb-8 px-6 md:px-0">
    <div class="container mx-auto h-full">
        <div class="flex items-center justify-center h-12">
            <div class="mr-6">
                <a href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
            </div>
            <div class="flex-1 text-right">
                <a href="{{ route('cart.index') }}"
                   class="hover:underline text-sm pr-4 {{ Cart::count() > 0 ? 'text-green-dark' : 'text-grey-darker' }}">
                    Cart
                </a>

                @guest
                    <a href="{{ url('/login') }}" class="hover:underline text-grey-darker pr-3 text-sm">
                        Login
                    </a>
                    <a href="{{ url('/register') }}" class="hover:underline text-grey-darker text-sm">
                        Register
                    </a>
                @else
                    <div class="dropdown relative inline-block">
                        <div class="flex justify-center">
                            <button class="text-grey-darker text-sm">
                                {{ Auth::user()->username }}
                            </button>
                            <div class="pointer-events-none text-grey-darker mr-4">
                                <svg class="fill-current h-4 w-4"
                                     xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 20 20"
                                >
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                </svg>
                            </div>
                        </div>

                        <div class="dropdown-content shadow-md absolute hidden bg-white z-10">
                            <a href="{{ route('orders.index') }}">My orders</a>

                            @if(Auth::user()->isAdmin)
                                <a href="{{ route('admin.books.index') }}">Admin</a>
                            @endif

                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Logout</a>
                        </div>
                    </div>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        {{ csrf_field() }}
                    </form>
                @endguest
            </div>
        </div>
    </div>
</nav>
