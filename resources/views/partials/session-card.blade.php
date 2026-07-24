<article class="flex flex-col gap-2 rounded-lg border border-slate-200 bg-white p-5">
    <h3 class="font-semibold leading-snug text-slate-900">{{ $session->title }}</h3>
    @if ($showSpeaker ?? true)
        <p class="text-sm text-slate-600">
            <a href="{{ route('speakers.show', $session->speaker) }}" class="font-medium text-accent">{{ $session->speaker->name }}</a>
        </p>
    @endif
    @if (($showTrack ?? false) && $session->track)
        <p class="flex items-center gap-2 text-sm text-slate-600">
            <span class="inline-block size-2.5 rounded-full" style="background-color: {{ $session->track->color }}" aria-hidden="true"></span>
            {{ $session->track->name }}
        </p>
    @endif
    <p class="mt-auto flex flex-wrap items-center gap-x-3 gap-y-1 pt-1 text-sm text-slate-500">
        <time datetime="{{ $session->starts_at->format('Y-m-d\TH:i') }}">{{ $session->starts_at->format('D H:i') }}</time>
        <span>{{ $session->room }}</span>
        <span class="rounded-full bg-slate-100 px-2.5 py-0.5 text-xs font-medium text-slate-600">{{ ucfirst($session->level) }}</span>
    </p>
</article>
