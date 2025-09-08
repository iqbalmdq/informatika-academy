<?php

namespace App\Filament\Mahasiswa\Resources\Forums\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ForumInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title'),
                TextEntry::make('user_id')
                    ->numeric(),
                TextEntry::make('course_id')
                    ->numeric(),
                TextEntry::make('category'),
                IconEntry::make('is_pinned')
                    ->boolean(),
                IconEntry::make('is_closed')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
