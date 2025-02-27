<nav class="bg-white dark:bg-[#161615] border-b border-[#e3e3e0] dark:border-[#3E3E3A] gap-2 p-3.5 ml-64 px-[2%]">
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-medium">@yield('title', 'Dashboard')</h1>
        <div class="flex items-center gap-4">
            @auth
                <span class="text-lm text-[#1b1b18] dark:text-[#EDEDEC]">
                    {{ Auth::user()->name }}
                </span>
                {{-- <a href="{{ route('profile.edit') }}" class="text-sm text-[#1b1b18] dark:text-[#EDEDEC] hover:text-[#f53003] dark:hover:text-[#FF4433]">
                    Perfil
                </a> --}}
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-sm text-[#1b1b18] dark:text-[#EDEDEC] hover:text-[#f53003] dark:hover:text-[#FF4433]">
                        Cerrar sesión
                    </button>
                </form>
            @endauth
        </div>
    </div>
</nav>

