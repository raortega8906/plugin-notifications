@extends('layouts.app')

@section('title', 'Proyectos')

@section('content')
<div class="container mx-auto px-4 py-8">
    
    <div class="flex justify-between items-center mb-6">
        <a href="{{ route('dashboard') }}"
            class="inline-block px-5 py-1.5 border-[#35415f] hover:border-[#35415f] border text-[#35415f] rounded-sm text-sm leading-normal">
            Ir al dashboard
        </a>
    </div>

    En estos momentos estamos trabajando en esta sección. Disculpa las molestias.
 
</div>

@endsection

