@extends('layouts.app')

@section('title', 'Vulnerabilidades de plugins por versión')

@section('content')
<div class="container mx-auto px-4 py-8">

    <div class="flex justify-between items-center mb-6">
        <a href="{{ route('api.vulnerabilities') }}" id="buscar-vulnerabilidades"  
            class="inline-block px-5 py-1.5 border-[#FF4433] hover:border-[#FF4433] border text-[#FF4433] rounded-sm text-sm leading-normal">
            Volver al historial
        </a>
    </div>

    <p class="inline-block py-3 text-[#35415f] text-lm leading-normal" id="historial-vulnerabilidades">
        Vulnerabilidades por versión de plugins
    </p>

    @if (count($vulnerabilities) > 0)
        <div class="bg-white dark:bg-[#161615] shadow-md rounded-lg overflow-hidden">
            <!-- Habilita el scroll horizontal sin ocultar contenido -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-[#e3e3e0] dark:divide-[#3E3E3A]">
                    <thead class="bg-[#f8f8f7] dark:bg-[#1D1D1B]">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] dark:text-[#A1A09A] uppercase tracking-wider">
                                Plugin
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] dark:text-[#A1A09A] uppercase tracking-wider">
                                Versión
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] dark:text-[#A1A09A] uppercase tracking-wider">
                                Descripción
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] dark:text-[#A1A09A] uppercase tracking-wider">
                                Gravedad - Enlace
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] dark:text-[#A1A09A] uppercase tracking-wider">
                                Proyecto
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-[#161615] divide-y divide-[#e3e3e0] dark:divide-[#3E3E3A]">
                        @foreach ($vulnerabilities as $vuln)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC]">
                                        {{ $vuln['plugin'] }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC]">
                                        {{ $vuln['version'] }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC]">
                                        {{ $vuln['description'] }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC]">
                                        @if($vuln['severity'] == 'l')
                                            <span class="text-green-500 dark:text-green-400">
                                                {{ __('Baja') }}
                                            </span>
                                        @elseif($vuln['severity'] == 'm')
                                            <span class="text-yellow-500 dark:text-yellow-400">
                                                {{ __('Mediana') }}
                                            </span>
                                        @elseif($vuln['severity'] == 'h')
                                            <span class="text-red-500 dark:text-red-400">
                                                {{ __('Alta') }}
                                            </span>
                                        @elseif($vuln['severity'] == 'c')
                                            <span class="text-red-500 dark:text-red-400">
                                                {{ __('Crítica') }}
                                            </span>
                                        @elseif($vuln['severity'] == 'Sin datos')
                                            <span class="text-gray-500 dark:text-gray-400">
                                                {{ __('Sin datos') }}
                                            </span>
                                        @elseif($vuln['severity'])
                                            <a href="{{ $vuln['severity'] }}" target="_blank" class="text-gray-500 hover:underline hover:text-red>">
                                                {{ $vuln['severity'] }}
                                            </a>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 max-w-xs">
                                    <div class="text-sm text-[#1b1b18] dark:text-[#EDEDEC]">
                                        {{ $vuln['project_id'] }}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="bg-white dark:bg-[#161615] shadow-md rounded-lg p-6 text-center">
            <p class="text-[#706f6c] dark:text-[#A1A09A]">{{ __('No hay vulnerabilidades de plugins registradas') }}</p>
        </div>
    @endif
</div>
@endsection
