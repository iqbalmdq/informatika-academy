<?php

namespace App\Filament\Mahasiswa\Resources\Mentorships\Pages;

use App\Filament\Mahasiswa\Resources\Mentorships\MentorshipResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMentorships extends ListRecords
{
    protected static string $resource = MentorshipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
