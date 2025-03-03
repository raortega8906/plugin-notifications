@extends('layouts.app')

@section('title', 'Proyectos')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <a href="{{ route('projects.create') }}" 
        class="inline-block px-5 py-1.5 bg-[#35415f] border-[#35415f] hover:border-[#35415f] border text-[#fff] rounded-sm text-sm leading-normal">
            Nuevo Proyecto
        </a>
    </div>

    @if(session('danger'))
        <div id="alert-danger" class="bg-[#f53003] text-white text-sm px-4 py-2 rounded-sm mb-4 flex justify-between items-center">
            {{ session('danger') }}
            <button onclick="closeAlert('alert-danger')" class="ml-4 text-white font-bold">X</button>
        </div>
    @endif

    @if(session('success'))
        <div id="alert-success" class="bg-[#329232] text-white text-sm px-4 py-2 rounded-sm mb-4 flex justify-between items-center">
            {{ session('success') }}
            <button onclick="closeAlert('alert-success')" class="ml-4 text-white font-bold">X</button>
        </div>
    @endif

    @if ($projects->count() > 0)
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
                                |
                                <a href="{{ route('projects.edit', $project) }}" class="text-[#927f32] dark:text-[#b4a751] hover:text-[#d8c558] dark:hover:text-[#c7a750]">
                                    Editar
                                </a>
                                |
                                <form action="{{ route('projects.destroy', $project) }}" method="POST" onsubmit="return confirmDelete(event)">
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
    @else
        <div class="bg-white dark:bg-[#161615] shadow-md rounded-lg p-6 text-center">
            <p class="text-[#706f6c] dark:text-[#A1A09A]">{{ __('No hay proyectos registrados') }}</p>
        </div>
    @endif
</div>

<script>
    function closeAlert(id) {
        document.getElementById(id).style.display = "none";
    }

    setTimeout(() => {
        let dangerAlert = document.getElementById('alert-danger');
        let successAlert = document.getElementById('alert-success');

        if (dangerAlert) dangerAlert.style.display = "none";
        if (successAlert) successAlert.style.display = "none";
    }, 3000);

    function confirmDelete(event) {
        event.preventDefault();

        if (confirm("¿Estás seguro de que deseas eliminar este proyecto? Esta acción no se puede deshacer y todos los plugins asociados se eliminarán.")) {
            event.target.submit();
        }
    }
</script>

@endsection

