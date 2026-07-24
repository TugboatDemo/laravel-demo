<?php

namespace App\Http\Controllers;

use App\Models\Speaker;
use Illuminate\View\View;

class SpeakerController extends Controller
{
    public function index(): View
    {
        $speakers = Speaker::query()
            ->orderBy('name')
            ->orderBy('id')
            ->get();

        return view('speakers.index', ['speakers' => $speakers]);
    }

    public function show(Speaker $speaker): View
    {
        $sessions = $speaker->sessions()
            ->with('track')
            ->orderBy('starts_at')
            ->orderBy('id')
            ->get();

        return view('speakers.show', [
            'speaker' => $speaker,
            'sessions' => $sessions,
        ]);
    }
}
