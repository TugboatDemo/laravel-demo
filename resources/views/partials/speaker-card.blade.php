{{-- Deliberately tight: one extra line of content reflows the whole grid. --}}
<article class="rounded-lg border border-slate-200 bg-white p-5">
    <a href="{{ route('speakers.show', $speaker) }}" class="flex items-center gap-4">
        @if ($speaker->headshot_path)
            <img src="{{ asset($speaker->headshot_path) }}"
                 alt="Portrait of {{ $speaker->name }}"
                 width="56" height="56"
                 class="size-14 shrink-0 rounded-full">
        @else
            <span aria-hidden="true"
                  class="flex size-14 shrink-0 items-center justify-center rounded-full bg-slate-200 text-lg font-semibold text-slate-500">
                {{ strtoupper(mb_substr($speaker->name, 0, 1)) }}
            </span>
        @endif
        <span class="min-w-0">
            <span class="block truncate font-semibold text-slate-900">{{ $speaker->name }}</span>
            <span class="block truncate text-sm text-slate-600">{{ $speaker->title }}</span>
        </span>
    </a>
</article>
