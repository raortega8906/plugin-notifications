@extends('layouts.app')

@section('title', 'Proyectos')

@section('content')

    @if ($projects->count() > 0)
        @foreach ($projects as $projects)
            {{ $company }}
        @endforeach
    @else
        {{ __('No hay proyectos registrados') }} 
    @endif

@endsection
