<aside class="w-64 bg-white dark:bg-[#161615] h-screen fixed left-0 top-0 border-r border-[#e3e3e0] dark:border-[#3E3E3A]">
    <div class="flex items-center gap-2 p-4 border-b border-[#e3e3e0] dark:border-[#3E3E3A]">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#f53003] dark:text-[#FF4433]">
            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
        </svg>
        <a href="/" class="font-medium text-lg">PluginGuard</a>
    </div>
    <nav class="mt-6">
        <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm {{ request()->routeIs('dashboard') ? 'bg-[#fff2f2] dark:bg-[#1D0002] text-[#f53003] dark:text-[#FF4433]' : 'text-[#1b1b18] dark:text-[#EDEDEC] hover:bg-[#fff2f2] dark:hover:bg-[#1D0002]' }}">
            Dashboard
        </a>
        <a href="{{ route('projects.index') }}" class="block px-4 py-2 text-sm {{ request()->routeIs('projects.index') ? 'bg-[#fff2f2] dark:bg-[#1D0002] text-[#f53003] dark:text-[#FF4433]' : 'text-[#1b1b18] dark:text-[#EDEDEC] hover:bg-[#fff2f2] dark:hover:bg-[#1D0002]' }}">
            Proyectos
        </a>
        <a href="{{ route('plugins.monitoring') }}" class="block px-4 py-2 text-sm {{ request()->routeIs('plugins.monitoring') ? 'bg-[#fff2f2] dark:bg-[#1D0002] text-[#f53003] dark:text-[#FF4433]' : 'text-[#1b1b18] dark:text-[#EDEDEC] hover:bg-[#fff2f2] dark:hover:bg-[#1D0002]' }}">
            Plugins Monitoreados
        </a>
        {{-- <a href="#" class="block px-4 py-2 text-sm text-[#1b1b18] dark:text-[#EDEDEC] hover:bg-[#fff2f2] dark:hover:bg-[#1D0002]">
            Notificaciones
        </a>
        <a href="#" class="block px-4 py-2 text-sm text-[#1b1b18] dark:text-[#EDEDEC] hover:bg-[#fff2f2] dark:hover:bg-[#1D0002]">
            Configuración
        </a> --}}
    </nav>
</aside>
