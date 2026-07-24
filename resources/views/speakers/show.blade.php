@extends('layouts.app')

@section('title', $speaker->name)
@section('meta_description', Str::limit($speaker->name . ', ' . $speaker->title . ' at ' . $speaker->company . '. ' . $speaker->bio, 155))

@section('content')
    <p class="text-sm"><a href="{{ route('speakers.index') }}" class="font-medium text-accent">&larr; All speakers</a></p>

    <div class="mt-6 flex flex-col gap-6 cards:flex-row cards:items-start">
        @if ($speaker->headshot_path)
            <img src="{{ asset($speaker->headshot_path) }}"
                 alt="Portrait of {{ $speaker->name }}"
                 width="112" height="112"
                 class="size-28 shrink-0 rounded-full">
        @else
            <span aria-hidden="true"
                  class="flex size-28 shrink-0 items-center justify-center rounded-full bg-slate-200 text-4xl font-semibold text-slate-500">
                {{ strtoupper(mb_substr($speaker->name, 0, 1)) }}
            </span>
        @endif
        <div class="min-w-0">
            <h1 class="text-2xl font-bold tracking-tight">{{ $speaker->name }}</h1>
            <p class="mt-1 text-slate-600">{{ $speaker->title }} · {{ $speaker->company }}</p>
            <p class="mt-4 max-w-prose text-slate-700">{{ $speaker->bio }}</p>
        </div>
    </div>

    <section class="mt-10" aria-labelledby="speaker-sessions">
        <h2 id="speaker-sessions" class="text-lg font-semibold">{{ Str::plural('Session', $sessions->count()) }}</h2>
        <div class="mt-4 grid grid-cols-1 gap-4 cards:grid-cols-2">
            @foreach ($sessions as $session)
                @include('partials.session-card', ['session' => $session, 'showSpeaker' => false, 'showTrack' => true])
            @endforeach
        </div>
    </section>
@endsection
