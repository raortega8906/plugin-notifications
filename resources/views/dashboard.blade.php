@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <div class="bg-white dark:bg-[#161615] p-6 rounded-lg shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d]">
        <div class="flex items-center gap-3 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#f53003] dark:text-[#FF4433]">
                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/>
                <path d="M13.73 21a2 2 0 0 1-3.46 0"/>
            </svg>
            <h2 class="font-medium">Notificaciones</h2>
        </div>
        <p class="text-[#706f6c] dark:text-[#A1A09A] text-sm mb-4">
            En caso de no recibir notificaciones, busca vulnerabilidades manualmente.
        </p>
        <a href="{{ route('vulnerabilities.index') }}" class="text-[#f53003] dark:text-[#FF4433] text-sm font-medium underline underline-offset-4 inline-flex items-center">
            <span>Historial de vulnerabilidades</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-1">
                <path d="M5 12h14"/>
                <path d="m12 5 7 7-7 7"/>
            </svg>
        </a>
    </div>
    
    <div class="bg-white dark:bg-[#161615] p-6 rounded-lg shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d]">
        <div class="flex items-center gap-3 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#f53003] dark:text-[#FF4433]">
                <circle cx="11" cy="11" r="8"/>
                <path d="m21 21-4.3-4.3"/>
            </svg>
            <h2 class="font-medium">Plugins Monitoreados</h2>
        </div>
        @if ($pluginsAll->count() > 0)
            <p class="text-[#706f6c] dark:text-[#A1A09A] text-sm mb-4">
                Actualmente hay {{ $pluginsAll->count() }} plugins registrados para monitorear.
            </p>
            <a href="{{ route('plugins.monitoring') }}" class="text-[#f53003] dark:text-[#FF4433] text-sm font-medium underline underline-offset-4 inline-flex items-center">
                <span>Ver plugins</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-1">
                    <path d="M5 12h14"/>
                    <path d="m12 5 7 7-7 7"/>
                </svg>
            </a>
        @else
            <p class="text-[#706f6c] dark:text-[#A1A09A] text-sm mb-4">
                Actualmente no tienes plugins registrados para monitoreo.
            </p>
            <a href="{{ route('projects.index') }}" class="text-[#f53003] dark:text-[#FF4433] text-sm font-medium underline underline-offset-4 inline-flex items-center">
                <span>Añadir plugins por proyectos</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-1">
                    <path d="M5 12h14"/>
                    <path d="m12 5 7 7-7 7"/>
                </svg>
            </a>
        @endif
    </div>
    
    <div class="bg-white dark:bg-[#161615] p-6 rounded-lg shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d]">
        <div class="flex items-center gap-3 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#f53003] dark:text-[#FF4433]">
                <rect width="18" height="11" x="3" y="11" rx="2" ry="2"/>
                <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
            </svg>
            <h2 class="font-medium">Configuración</h2>
        </div>
        <p class="text-[#706f6c] dark:text-[#A1A09A] text-sm mb-4">
            Personaliza tus proyectos para recibir notificaciones de vulnerabilidades.
        </p>
        <a href="{{ route('projects.index') }}" class="text-[#f53003] dark:text-[#FF4433] text-sm font-medium underline underline-offset-4 inline-flex items-center">
            <span>Configurar proyectos</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-1">
                <path d="M5 12h14"/>
                <path d="m12 5 7 7-7 7"/>
            </svg>
        </a>
    </div>
</div>

<div class="bg-white dark:bg-[#161615] p-6 mt-8 rounded-lg shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d]">
    <div class="flex items-center justify-between mb-4">
        <h2 class="font-medium text-lg">Resumen General</h2>
        <span class="text-sm text-gray-500 dark:text-gray-400">Última actualización: {{ now()->locale('es')->translatedFormat('l, j \d\e F \d\e Y') }}</span>
    </div>

    <div class="grid grid-cols-3 gap-4 text-center">
        <div>
            <h3 class="text-2xl font-semibold text-[#f53003] dark:text-[#FF4433]">{{ count($vulnerabilities) }}</h3>
            <p class="text-sm text-gray-500 dark:text-gray-400">Vulnerabilidades</p>
        </div>
        <div>
            <h3 class="text-2xl font-semibold text-green-500">Controlada</h3>
            <p class="text-sm text-gray-500 dark:text-gray-400">Estado de la empresa según vulnerabilidades</p>
        </div>
        <div>
            <h3 class="text-2xl font-semibold text-blue-500">{{ $pluginsAll->count() }}</h3>
            <p class="text-sm text-gray-500 dark:text-gray-400">Plugins Monitoreados</p>
        </div>
    </div>

    <div class="mt-6">
        <div id="vulnerabilitiesChart"></div>
    </div>
</div>

{{-- scripts chart--}}
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var options = {
            series: [{
                name: "Vulnerabilidades",
                data: [20, 15, 7, 18, 9, 12, 10] 
            }],
            chart: {
                type: "line",
                height: 250
            },
            xaxis: {
                categories: ["Lun", "Mar", "Mié", "Jue", "Vie", "Sáb", "Dom"]
            },
            colors: ["#f53003"],
            stroke: {
                curve: "smooth"
            }
        };

        var chart = new ApexCharts(document.querySelector("#vulnerabilitiesChart"), options);
        chart.render();
    });
</script>

@endsection
