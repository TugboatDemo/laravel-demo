<?php

namespace App\Filament\Resources\Sessions\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class SessionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                Textarea::make('abstract')
                    ->rows(5)
                    ->columnSpanFull(),
                Select::make('speaker_id')
                    ->relationship('speaker', 'name')
                    ->required(),
                Select::make('track_id')
                    ->relationship('track', 'name')
                    ->required(),
                TextInput::make('room')
                    ->required(),
                DateTimePicker::make('starts_at')
                    ->required(),
                Select::make('level')
                    ->options(['beginner' => 'Beginner', 'intermediate' => 'Intermediate', 'advanced' => 'Advanced'])
                    ->required(),
            ]);
    }
}
