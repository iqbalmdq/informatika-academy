<?php

namespace App\Filament\Dosen\Resources\Modules;

use App\Filament\Dosen\Resources\Modules\Pages\CreateModule;
use App\Filament\Dosen\Resources\Modules\Pages\EditModule;
use App\Filament\Dosen\Resources\Modules\Pages\ListModules;
use App\Filament\Dosen\Resources\Modules\Pages\ViewModule;
use App\Filament\Dosen\Resources\Modules\Schemas\ModuleForm;
use App\Filament\Dosen\Resources\Modules\Schemas\ModuleInfolist;
use App\Filament\Dosen\Resources\Modules\Tables\ModulesTable;
use App\Models\Module;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ModuleResource extends Resource
{
    protected static ?string $model = Module::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Module';

    public static function form(Schema $schema): Schema
    {
        return ModuleForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ModuleInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ModulesTable::configure($table);
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
            'index' => ListModules::route('/'),
            'create' => CreateModule::route('/create'),
            'view' => ViewModule::route('/{record}'),
            'edit' => EditModule::route('/{record}/edit'),
        ];
    }
}
