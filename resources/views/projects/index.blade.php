@extends('layouts.app')

@section('title', 'Proyectos')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <a href="{{ route('projects.create') }}" class="bg-[#35415f] hover:bg-[#5b597c] text-white py-2 px-4 rounded">
            Nuevo Proyecto
        </a>
    </div>

    @if ($projects->count() > 0)
        <div class="bg-white dark:bg-[#161615] shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-[#e3e3e0] dark:divide-[#3E3E3A]">
                <thead class="bg-[#f8f8f7] dark:bg-[#1D1D1B]">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] dark:text-[#A1A09A] uppercase tracking-wider">
                            Nombre
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
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex justify-end gap-2">
                                <a href="" class="text-[#927f32] dark:text-[#b4a751] hover:text-[#d8c558] dark:hover:text-[#c7a750]">
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
                            {{-- <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="" class="text-[#f53003] dark:text-[#FF4433] hover:text-[#d42a02] dark:hover:text-[#ff6b5b]">Editar</a>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="bg-white dark:bg-[#161615] shadow-md rounded-lg p-6 text-center">
            <p class="text-[#706f6c] dark:text-[#A1A09A]">{{ __('No hay proyectos registrados') }}</p>
        </div>
    @endif
</div>
@endsection

