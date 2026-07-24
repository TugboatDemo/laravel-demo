<?php

namespace App\Filament\Widgets;

use App\Models\Track;
use Filament\Widgets\ChartWidget;

class SessionsPerTrack extends ChartWidget
{
    protected ?string $heading = 'Sessions per track';

    // ChartWidget polls every 5s by default; an open dashboard tab would
    // ping the preview indefinitely. The data only changes on admin edits.
    protected ?string $pollingInterval = null;

    protected function getData(): array
    {
        $tracks = Track::query()
            ->withCount('sessions')
            ->orderBy('id')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Sessions',
                    'data' => $tracks->pluck('sessions_count')->all(),
                    'backgroundColor' => $tracks->pluck('color')->all(),
                ],
            ],
            'labels' => $tracks->pluck('name')->all(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
