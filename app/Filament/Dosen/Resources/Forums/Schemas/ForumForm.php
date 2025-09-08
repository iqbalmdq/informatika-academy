<?php

namespace App\Filament\Dosen\Resources\Forums\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ForumForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Judul')
                    ->required(),
                Textarea::make('content')
                    ->label('Konten')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('user_id')
                    ->label('ID Pengguna')
                    ->required()
                    ->numeric(),
                TextInput::make('course_id')
                    ->label('ID Kursus')
                    ->numeric()
                    ->default(null),
                Select::make('category')
                    ->label('Kategori')
                    ->options([
                        'general' => 'Umum',
                        'course' => 'Kursus',
                        'project' => 'Proyek',
                        'mentorship' => 'Mentorship',
                    ])
                    ->required(),
                Toggle::make('is_pinned')
                    ->label('Disematkan')
                    ->required(),
                Toggle::make('is_closed')
                    ->label('Ditutup')
                    ->required(),
            ]);
    }
}
