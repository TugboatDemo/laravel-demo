<?php

namespace App\Filament\Resources\Speakers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class SpeakerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                TextInput::make('title')
                    ->required(),
                TextInput::make('company')
                    ->required(),
                Textarea::make('bio')
                    ->required()
                    ->rows(4)
                    ->columnSpanFull(),
                TextInput::make('headshot_path')
                    ->default(null),
            ]);
    }
}
