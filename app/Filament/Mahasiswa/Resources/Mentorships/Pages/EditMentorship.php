<?php

namespace App\Filament\Mahasiswa\Resources\Mentorships\Pages;

use App\Filament\Mahasiswa\Resources\Mentorships\MentorshipResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditMentorship extends EditRecord
{
    protected static string $resource = MentorshipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
