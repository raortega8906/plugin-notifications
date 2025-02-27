@extends('layouts.guest')

@section('content')
<div class="w-full max-w-md">
    <div class="flex justify-center mb-8">
        <a href="/" class="flex items-center gap-2 text-[#f53003] dark:text-[#FF4433]">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
            </svg>
            <span class="text-xl font-medium">PluginGuard</span>
        </a>
    </div>
    
    <div class="bg-white dark:bg-[#161615] p-8 rounded-lg shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d]">
        <h1 class="text-xl font-medium mb-6">Crear cuenta</h1>
        
        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium mb-1 text-[#706f6c] dark:text-[#A1A09A]">
                    Nombre
                </label>
                <input 
                    type="text" 
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    required 
                    autofocus
                    class="w-full px-3 py-2 border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-sm bg-transparent focus:outline-none focus:ring-1 focus:ring-[#f53003] dark:focus:ring-[#FF4433]"
                />
            </div>
            
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
                    class="w-full px-3 py-2 border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-sm bg-transparent focus:outline-none focus:ring-1 focus:ring-[#f53003] dark:focus:ring-[#FF4433]"
                />
            </div>
            
            <div>
                <label for="password" class="block text-sm font-medium mb-1 text-[#706f6c] dark:text-[#A1A09A]">
                    Contraseña
                </label>
                <input 
                    type="password" 
                    id="password"
                    name="password"
                    required
                    class="w-full px-3 py-2 border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-sm bg-transparent focus:outline-none focus:ring-1 focus:ring-[#f53003] dark:focus:ring-[#FF4433]"
                />
            </div>
            
            <div>
                <label for="password_confirmation" class="block text-sm font-medium mb-1 text-[#706f6c] dark:text-[#A1A09A]">
                    Confirmar contraseña
                </label>
                <input 
                    type="password" 
                    id="password_confirmation"
                    name="password_confirmation"
                    required
                    class="w-full px-3 py-2 border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-sm bg-transparent focus:outline-none focus:ring-1 focus:ring-[#f53003] dark:focus:ring-[#FF4433]"
                />
            </div>
            
            <div class="flex items-center">
                <input 
                    type="checkbox" 
                    id="terms"
                    name="terms"
                    required
                    class="h-4 w-4 border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-sm bg-transparent focus:ring-[#f53003] dark:focus:ring-[#FF4433]"
                />
                <label for="terms" class="ml-2 text-sm text-[#706f6c] dark:text-[#A1A09A]">
                    Acepto los <a href="#" class="text-[#f53003] dark:text-[#FF4433] hover:underline">términos y condiciones</a>
                </label>
            </div>
            
            <button 
                type="submit" 
                class="w-full dark:bg-[#eeeeec] dark:border-[#eeeeec] dark:text-[#1C1C1A] dark:hover:bg-white dark:hover:border-white hover:bg-black hover:border-black px-5 py-2 bg-[#1b1b18] rounded-sm border border-black text-white text-sm"
            >
                Registrarse
            </button>
        </form>
    </div>
    
    <div class="text-center mt-6">
        <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">
            ¿Ya tienes una cuenta?
            <a href="{{ route('login') }}" class="text-[#f53003] dark:text-[#FF4433] hover:underline">
                Inicia sesión
            </a>
        </p>
    </div>
</div>
@endsection

