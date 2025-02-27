@extends('layouts.app')

@section('title', 'Editar Proyecto')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-md mx-auto bg-white dark:bg-[#161615] shadow-md rounded-lg overflow-hidden">
        <div class="p-6">
            <h2 class="text-2xl font-medium mb-6">Editar Proyecto</h2>
            <form action="{{ route('projects.update', $project) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium mb-1 text-[#706f6c] dark:text-[#A1A09A]">
                        Nombre del Proyecto
                    </label>
                    <input 
                        type="text" 
                        id="name"
                        name="name"
                        value="{{ $project->name }}"
                        required
                        class="w-full px-3 py-2 border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-sm bg-transparent focus:outline-none focus:ring-1 focus:ring-[#f53003] dark:focus:ring-[#FF4433]"
                    />
                </div>
                <div class="flex justify-end">
                    <button 
                        type="submit" 
                        class="bg-[#647765] hover:bg-[#7e9d88] text-white py-2 px-4 rounded"
                    >
                        Actualizar Proyecto
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

