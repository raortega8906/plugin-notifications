@extends('layouts.app')

@section('title', 'Crear Proyecto')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-md mx-auto bg-white dark:bg-[#161615] shadow-md rounded-lg overflow-hidden">
        <div class="p-6">
            <h2 class="text-2xl font-medium mb-6">Crear Nuevo Proyecto</h2>
            <form action="{{ route('projects.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium mb-1 text-[#706f6c] dark:text-[#A1A09A]">
                        Nombre del Proyecto
                    </label>
                    <input 
                        type="text" 
                        id="name"
                        name="name"
                        required
                        class="w-full px-3 py-2 border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-sm bg-transparent focus:outline-none focus:ring-1 focus:ring-[#f53003] dark:focus:ring-[#FF4433]"
                    />
                </div>
                <div class="flex justify-end">
                    <button 
                        type="submit" 
                        class="inline-block px-5 py-1.5 bg-[#647765] border-[#fff] hover:border-[#fff] border text-[#fff] rounded-sm text-sm leading-normal"
                    >
                        Crear Proyecto
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

