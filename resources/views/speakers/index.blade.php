@extends('layouts.app')

@section('title', 'Speakers')
@section('meta_description', 'The Harbor Conf 2026 speaker lineup — forty engineers, architects, and maintainers from across the Laravel community.')

@section('content')
    <h1 class="text-2xl font-bold tracking-tight">Speakers</h1>
    <p class="mt-1 text-slate-600">Forty speakers from across the Laravel community.</p>

    <div class="mt-8 grid grid-cols-1 gap-4 cards:grid-cols-2 xl:grid-cols-3">
        @foreach ($speakers as $speaker)
            @include('partials.speaker-card', ['speaker' => $speaker])
        @endforeach
    </div>
@endsection
