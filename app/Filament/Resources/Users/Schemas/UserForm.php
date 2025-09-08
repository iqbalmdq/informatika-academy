<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DateTimePicker;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Lengkap')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Masukkan nama lengkap'),
                    
                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true)
                    ->placeholder('contoh@email.com'),
                    
                Select::make('role')
                    ->label('Role/Peran')
                    ->required()
                    ->options([
                        'kaprodi' => 'Kaprodi',
                        'staff' => 'Staff',
                        'dosen' => 'Dosen',
                        'mahasiswa' => 'Mahasiswa',
                    ])
                    ->default('mahasiswa')
                    ->native(false),
                    
                TextInput::make('password')
                    ->label('Password')
                    ->password()
                    ->required(fn ($context): bool => $context === 'create')
                    ->dehydrated(fn ($state) => filled($state))
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                    ->rule(Password::default())
                    ->placeholder('Minimal 8 karakter')
                    ->helperText('Kosongkan jika tidak ingin mengubah password (untuk edit)'),
                    
                TextInput::make('password_confirmation')
                    ->label('Konfirmasi Password')
                    ->password()
                    ->required(fn ($context): bool => $context === 'create')
                    ->dehydrated(false)
                    ->same('password')
                    ->placeholder('Ulangi password'),
                    
                DateTimePicker::make('email_verified_at')
                    ->label('Email Terverifikasi')
                    ->nullable()
                    ->helperText('Kosongkan jika email belum terverifikasi')
                    ->displayFormat('d/m/Y H:i')
                    ->timezone('Asia/Jakarta'),
            ]);
    }
}
