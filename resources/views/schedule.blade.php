@extends('layouts.app')

@section('title', 'Schedule')
@section('meta_description', 'The full Harbor Conf 2026 schedule — 60 sessions across five tracks over two days, 15–16 September.')

@section('content')
    <h1 class="text-2xl font-bold tracking-tight">Schedule</h1>
    <p class="mt-1 text-slate-600">Two days, five tracks, sixty sessions. All times local.</p>

    @foreach ($tracks as $track)
        <section class="mt-10" aria-labelledby="track-{{ $track->slug }}">
            <h2 id="track-{{ $track->slug }}" class="flex items-center gap-2.5 text-lg font-semibold">
                <span class="inline-block size-3 rounded-full" style="background-color: {{ $track->color }}" aria-hidden="true"></span>
                {{ $track->name }}
            </h2>
            <div class="mt-4 grid grid-cols-1 gap-4 cards:grid-cols-2 xl:grid-cols-3">
                @foreach ($track->sessions as $session)
                    @include('partials.session-card', ['session' => $session, 'showSpeaker' => true])
                @endforeach
            </div>
        </section>
    @endforeach
@endsection
