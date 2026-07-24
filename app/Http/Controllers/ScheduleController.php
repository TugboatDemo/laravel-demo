<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\View\View;

class ScheduleController extends Controller
{
    public function __invoke(): View
    {
        $tracks = Track::query()
            ->orderBy('id')
            ->with([
                'sessions' => fn ($query) => $query->orderBy('starts_at')->orderBy('id'),
                'sessions.speaker',
            ])
            ->get();

        return view('schedule', ['tracks' => $tracks]);
    }
}
