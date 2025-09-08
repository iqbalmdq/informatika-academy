<?php

namespace App\Filament\Mahasiswa\Resources\Mentorships\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class MentorshipForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('mentor_id')
                    ->required()
                    ->numeric(),
                TextInput::make('mentee_id')
                    ->required()
                    ->numeric(),
                Select::make('type')
                    ->options(['coaching_clinic' => 'Coaching clinic', 'mentorship_program' => 'Mentorship program'])
                    ->required(),
                TextInput::make('title')
                    ->required(),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                DateTimePicker::make('scheduled_at')
                    ->required(),
                Select::make('status')
                    ->options([
            'pending' => 'Pending',
            'approved' => 'Approved',
            'completed' => 'Completed',
            'cancelled' => 'Cancelled',
        ])
                    ->default('pending')
                    ->required(),
                Textarea::make('notes')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('github_repo')
                    ->default(null),
            ]);
    }
}
