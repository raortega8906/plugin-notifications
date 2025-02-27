@extends('layouts.guest')

@section('content')
<div class="w-full max-w-md">
    <div class="flex justify-center mb-8">
        <a href="" class="flex items-center gap-2 text-[#f53003] dark:text-[#FF4433]">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
            </svg>
            <span class="text-xl font-medium">PluginGuard</span>
        </a>
    </div>
    
    <div class="bg-white dark:bg-[#161615] p-8 rounded-lg shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d]">
        <h1 class="text-xl font-medium mb-6">Iniciar sesión</h1>
        
        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium mb-1 text-[#706f6c] dark:text-[#A1A09A]">
                    Correo electrónico
                </label>
                <input 
                    type="email" 
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    class="w-full px-3 py-2 border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-sm bg-transparent focus:outline-none focus:ring-1 focus:ring-[#f53003] dark:focus:ring-[#FF4433]"
                />
            </div>
            
            <div>
                <div class="flex justify-between mb-1">
                    <label for="password" class="block text-sm font-medium text-[#706f6c] dark:text-[#A1A09A]">
                        Contraseña
                    </label>
                    @if (Route::has('password.request'))
                        {{-- <a href="{{ route('password.request') }}" class="text-sm text-[#f53003] dark:text-[#FF4433] hover:underline">
                            ¿Olvidaste tu contraseña?
                        </a> --}}
                    @endif
                </div>
                <input 
                    type="password" 
                    id="password"
                    name="password"
                    required
                    class="w-full px-3 py-2 border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-sm bg-transparent focus:outline-none focus:ring-1 focus:ring-[#f53003] dark:focus:ring-[#FF4433]"
                />
            </div>
            
            <div class="flex items-center">
                <input 
                    type="checkbox" 
                    id="remember"
                    name="remember"
                    class="h-4 w-4 border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-sm bg-transparent focus:ring-[#f53003] dark:focus:ring-[#FF4433]"
                />
                <label for="remember" class="ml-2 text-sm text-[#706f6c] dark:text-[#A1A09A]">
                    Recordarme
                </label>
            </div>
            
            <button 
                type="submit" 
                class="w-full dark:bg-[#eeeeec] dark:border-[#eeeeec] dark:text-[#1C1C1A] dark:hover:bg-white dark:hover:border-white hover:bg-black hover:border-black px-5 py-2 bg-[#1b1b18] rounded-sm border border-black text-white text-sm"
            >
                Iniciar sesión
            </button>
        </form>
    </div>
    
    <div class="text-center mt-6">
        <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">
            ¿No tienes una cuenta?
            <a href="{{ route('register') }}" class="text-[#f53003] dark:text-[#FF4433] hover:underline">
                Regístrate
            </a>
        </p>
    </div>
</div>
@endsection

