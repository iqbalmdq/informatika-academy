<?php

namespace App\Filament\Mahasiswa\Resources\Mentorships\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class MentorshipInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('mentor_id')
                    ->numeric(),
                TextEntry::make('mentee_id')
                    ->numeric(),
                TextEntry::make('type'),
                TextEntry::make('title'),
                TextEntry::make('scheduled_at')
                    ->dateTime(),
                TextEntry::make('status'),
                TextEntry::make('github_repo'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
