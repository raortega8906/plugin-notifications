@extends('layouts.app')

@section('title', 'Vulnerabilidades de plugins')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <a href="" class="bg-[#35415f] hover:bg-[#5b597c] text-white py-2 px-4 rounded">
            Buscar vulnerabilidades
        </a>
    </div>

    {{-- @if ($projects->count() > 0)
        <div class="bg-white dark:bg-[#161615] shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-[#e3e3e0] dark:divide-[#3E3E3A]">
                <thead class="bg-[#f8f8f7] dark:bg-[#1D1D1B]">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] dark:text-[#A1A09A] uppercase tracking-wider">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] dark:text-[#A1A09A] uppercase tracking-wider flex justify-center">
                            Cantidad de plugins
                        </th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-[#706f6c] dark:text-[#A1A09A] uppercase tracking-wider">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-[#161615] divide-y divide-[#e3e3e0] dark:divide-[#3E3E3A]">
                    @foreach ($projects as $project)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC]">
                                    {{ $project->name }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] flex justify-center gap-2">
                                    {{ $project->plugins->count() }} 
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex justify-end gap-2">
                                <a href="{{ route('projects.show', $project) }}" class="text-[#329232] dark:text-[#51b454] hover:text-[#d8c558] dark:hover:text-[#c7a750]">
                                    Ver Plugins
                                </a>
                                <a href="{{ route('projects.edit', $project) }}" class="text-[#927f32] dark:text-[#b4a751] hover:text-[#d8c558] dark:hover:text-[#c7a750]">
                                    Editar
                                </a>
                                <form action="{{ route('projects.destroy', $project) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-[#f53003] dark:text-[#FF4433] hover:text-[#d42a02] dark:hover:text-[#ff6b5b]">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else --}}
        <div class="bg-white dark:bg-[#161615] shadow-md rounded-lg p-6 text-center">
            <p class="text-[#706f6c] dark:text-[#A1A09A]">{{ __('No hay vulnerabilidades de plugins registradas') }}</p>
        </div>
    {{-- @endif --}}
</div>
            
{{-- Mostrar datos del plugin --}}
{{-- Mostrar nombre del plugin --}}
{{-- <p>{{ $data['data']['name'] }}</p> --}}

{{-- Mostrar vulnerabilidades --}}
{{-- @if (!empty($vulnerabilities))
    <ul>
    @foreach ($vulnerabilities as $vulnerability)
        <li>
            <strong>{{ $vulnerability['name'] }}</strong>
        </li>
    @endforeach
    </ul>
@else
    <p>No vulnerabilities found.</p>
@endif --}}


@endsection