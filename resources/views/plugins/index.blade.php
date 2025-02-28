@extends('layouts.app')

@section('title', "Plugins monitoreados") 

@section('content')
<div class="container mx-auto px-4 py-8">

    @if ($plugins->count() > 0)
        <div class="bg-white dark:bg-[#161615] shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-[#e3e3e0] dark:divide-[#3E3E3A]">
                <thead class="bg-[#f8f8f7] dark:bg-[#1D1D1B]">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] dark:text-[#A1A09A] uppercase tracking-wider">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] dark:text-[#A1A09A] uppercase tracking-wider">
                            Slug
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] dark:text-[#A1A09A] uppercase tracking-wider">
                            Versión
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] dark:text-[#A1A09A] uppercase tracking-wider">
                            Monitoreo
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-[#161615] divide-y divide-[#e3e3e0] dark:divide-[#3E3E3A]">
                    @foreach ($plugins as $plugin)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC]">
                                    {{ $plugin->name }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC]">
                                    {{ $plugin->slug }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC]">
                                    {{ $plugin->version }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap flex justify-center gap-2">
                                <div class="text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC]">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#f53003] dark:text-[#FF4433]">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <path d="m21 21-4.3-4.3"></path>
                                    </svg>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="bg-white dark:bg-[#161615] shadow-md rounded-lg p-6 text-center">
            <p class="text-[#706f6c] dark:text-[#A1A09A]">{{ __('No hay plugins registrados') }}</p>
        </div>
    @endif
    
</div>
@endsection