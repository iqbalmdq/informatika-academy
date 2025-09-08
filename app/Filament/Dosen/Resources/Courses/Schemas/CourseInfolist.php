<?php

namespace App\Filament\Dosen\Resources\Courses\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\IconEntry;
use Filament\Schemas\Schema;

class CourseInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title'),
                TextEntry::make('slug'),
                TextEntry::make('thumbnail'),
                TextEntry::make('instructor_id')
                    ->numeric(),
                TextEntry::make('level'),
                TextEntry::make('duration_hours')
                    ->numeric(),
                TextEntry::make('price')
                    ->money(),
                IconEntry::make('is_published')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ])
            ->columns(2);
    }
}
