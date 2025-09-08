<?php

namespace App\Filament\Resources\Mentorships\Pages;

use App\Filament\Resources\Mentorships\MentorshipResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewMentorship extends ViewRecord
{
    protected static string $resource = MentorshipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
