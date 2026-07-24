<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') · Harbor Conf 2026</title>
    <meta name="description" content="@yield('meta_description', 'Harbor Conf 2026 — two days of Laravel and PHP sessions across five tracks. Browse the schedule and meet the speakers.')">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-50 text-slate-900 antialiased">
    <div class="h-1 bg-accent" aria-hidden="true"></div>
    <header class="border-b border-slate-200 bg-white">
        <div class="mx-auto flex max-w-6xl items-center justify-between px-4 py-4 sm:px-6">
            <a href="{{ route('schedule') }}" class="text-lg font-bold tracking-tight">
                Harbor<span class="text-accent">Conf</span> <span class="font-normal text-slate-500">2026</span>
            </a>
            <nav aria-label="Main navigation">
                <ul class="flex items-center gap-6 text-sm font-medium">
                    <li>
                        <a href="{{ route('schedule') }}"
                           @if(request()->routeIs('schedule')) aria-current="page" @endif
                           class="{{ request()->routeIs('schedule') ? 'border-b-2 border-accent pb-1 text-slate-900' : 'text-slate-600' }}">
                            Schedule
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('speakers.index') }}"
                           @if(request()->routeIs('speakers.*')) aria-current="page" @endif
                           class="{{ request()->routeIs('speakers.*') ? 'border-b-2 border-accent pb-1 text-slate-900' : 'text-slate-600' }}">
                            Speakers
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="mx-auto max-w-6xl px-4 py-8 sm:px-6">
        @yield('content')
    </main>

    <footer class="mt-12 border-t border-slate-200 bg-white">
        <div class="mx-auto flex max-w-6xl items-center justify-between px-4 py-6 text-sm text-slate-500 sm:px-6">
            <p>Harbor Conf · 15–16 September 2026 · Harbourside Convention Centre</p>
            <p><a href="{{ route('speakers.index') }}" class="font-medium text-accent">Meet the speakers</a></p>
        </div>
    </footer>
</body>
</html>
