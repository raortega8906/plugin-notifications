@extends('layouts.app')

@section('title', 'Crear Plugin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-md mx-auto bg-white dark:bg-[#161615] shadow-md rounded-lg overflow-hidden">
        <div class="p-6">
            <h2 class="text-2xl font-medium mb-6">Crear Nuevo Plugin</h2>
            <form action="{{ route('plugins.store', $project) }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium mb-1 text-[#706f6c] dark:text-[#A1A09A]">
                        Nombre del Plugin
                    </label>
                    <input 
                        type="text" 
                        id="name"
                        name="name"
                        required
                        class="w-full px-3 py-2 border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-sm bg-transparent focus:outline-none focus:ring-1 focus:ring-[#f53003] dark:focus:ring-[#FF4433]"
                    />
                </div>

                <div class="mb-4">
                    <label for="slug" class="block text-sm font-medium mb-1 text-[#706f6c] dark:text-[#A1A09A]">
                        Slug del Plugin
                    </label>
                    <input 
                        type="text" 
                        id="slug"
                        name="slug"
                        required
                        class="w-full px-3 py-2 border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-sm bg-transparent focus:outline-none focus:ring-1 focus:ring-[#f53003] dark:focus:ring-[#FF4433]"
                    />
                </div>

                <div class="mb-4">
                    <label for="version" class="block text-sm font-medium mb-1 text-[#706f6c] dark:text-[#A1A09A]">
                        Versión del Plugin
                    </label>
                    <input 
                        type="text" 
                        id="version"
                        name="version"
                        required
                        class="w-full px-3 py-2 border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-sm bg-transparent focus:outline-none focus:ring-1 focus:ring-[#f53003] dark:focus:ring-[#FF4433]"
                    />
                </div>

                <div class="flex justify-end">
                    <button 
                        type="submit" 
                        class="bg-[#647765] hover:bg-[#7e9d88] text-white py-2 px-4 rounded"
                    >
                        Crear Plugin
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
