<?php

namespace App\Filament\Resources\Courses\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use App\Models\User;
use Illuminate\Support\Str;

class CourseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Judul Kursus')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (string $context, $state, callable $set) => $context === 'create' ? $set('slug', Str::slug($state)) : null)
                    ->placeholder('Masukkan judul kursus')
                    ->columnSpan(1),
                    
                TextInput::make('slug')
                    ->label('Slug URL')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true)
                    ->rules(['alpha_dash'])
                    ->helperText('URL-friendly version dari judul (otomatis diisi)')
                    ->placeholder('contoh-judul-kursus')
                    ->columnSpan(1),
                    
                Textarea::make('description')
                    ->label('Deskripsi Kursus')
                    ->required()
                    ->rows(4)
                    ->maxLength(1000)
                    ->placeholder('Jelaskan tentang kursus ini, apa yang akan dipelajari, dll.')
                    ->columnSpanFull(),
                    
                Select::make('instructor_id')
                    ->label('Instruktur')
                    ->required()
                    ->options(User::where('role', 'dosen')->pluck('name', 'id'))
                    ->searchable()
                    ->preload()
                    ->placeholder('Pilih instruktur')
                    ->columnSpan(1),
                    
                Select::make('level')
                    ->label('Level Kursus')
                    ->required()
                    ->options([
                        'beginner' => 'Pemula (Beginner)',
                        'intermediate' => 'Menengah (Intermediate)',
                        'advanced' => 'Lanjutan (Advanced)',
                    ])
                    ->default('beginner')
                    ->native(false)
                    ->columnSpan(1),
                    
                TextInput::make('duration_hours')
                    ->label('Durasi (Jam)')
                    ->required()
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(500)
                    ->suffix('jam')
                    ->placeholder('120')
                    ->columnSpan(1),
                    
                TextInput::make('price')
                    ->label('Harga')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->prefix('Rp')
                    ->placeholder('500000')
                    ->helperText('Masukkan 0 untuk kursus gratis')
                    ->columnSpan(1),
                    
                TextInput::make('thumbnail')
                    ->label('URL Thumbnail')
                    ->url()
                    ->maxLength(500)
                    ->placeholder('Kosongkan untuk gambar otomatis berdasarkan tema')
                    ->helperText('Jika kosong, sistem akan menggunakan gambar CDN sesuai tema course')
                    ->columnSpan(1),
                    
                Toggle::make('is_published')
                    ->label('Publikasikan Kursus')
                    ->default(false)
                    ->helperText('Kursus hanya akan terlihat jika dipublikasikan')
                    ->inline(false)
                    ->columnSpan(1),
            ])
            ->columns(2);
    }
}
