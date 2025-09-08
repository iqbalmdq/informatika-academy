<?php

namespace App\Filament\Mahasiswa\Resources\Mentorships;

use App\Filament\Mahasiswa\Resources\Mentorships\Pages\CreateMentorship;
use App\Filament\Mahasiswa\Resources\Mentorships\Pages\EditMentorship;
use App\Filament\Mahasiswa\Resources\Mentorships\Pages\ListMentorships;
use App\Filament\Mahasiswa\Resources\Mentorships\Pages\ViewMentorship;
use App\Filament\Mahasiswa\Resources\Mentorships\Schemas\MentorshipForm;
use App\Filament\Mahasiswa\Resources\Mentorships\Schemas\MentorshipInfolist;
use App\Filament\Mahasiswa\Resources\Mentorships\Tables\MentorshipsTable;
use App\Models\Mentorship;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MentorshipResource extends Resource
{
    protected static ?string $model = Mentorship::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Mentorship';

    public static function form(Schema $schema): Schema
    {
        return MentorshipForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return MentorshipInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MentorshipsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListMentorships::route('/'),
            'create' => CreateMentorship::route('/create'),
            'view' => ViewMentorship::route('/{record}'),
            'edit' => EditMentorship::route('/{record}/edit'),
        ];
    }
}
