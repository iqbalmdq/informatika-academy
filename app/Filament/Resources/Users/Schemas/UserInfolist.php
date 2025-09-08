<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\IconEntry;
use Filament\Schemas\Schema;

class UserInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Informasi Pengguna
                TextEntry::make('name')
                    ->label('Nama Lengkap')
                    ->size('lg')
                    ->weight('bold'),
                    
                TextEntry::make('email')
                    ->label('Email')
                    ->copyable()
                    ->icon('heroicon-o-envelope'),
                    
                TextEntry::make('role')
                    ->label('Role/Peran')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'kaprodi' => 'danger',
                        'staff' => 'warning',
                        'dosen' => 'info',
                        'mahasiswa' => 'success',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'kaprodi' => 'Kaprodi',
                        'staff' => 'Staff',
                        'dosen' => 'Dosen',
                        'mahasiswa' => 'Mahasiswa',
                        default => $state,
                    }),
                    
                // Status & Waktu
                TextEntry::make('email_verified_at')
                    ->label('Email Terverifikasi')
                    ->dateTime('d F Y, H:i')
                    ->timezone('Asia/Jakarta')
                    ->placeholder('Belum terverifikasi')
                    ->icon('heroicon-o-check-circle')
                    ->color('success'),
                    
                TextEntry::make('created_at')
                    ->label('Terdaftar Sejak')
                    ->dateTime('d F Y, H:i')
                    ->timezone('Asia/Jakarta')
                    ->icon('heroicon-o-calendar'),
                    
                TextEntry::make('updated_at')
                    ->label('Terakhir Diperbarui')
                    ->dateTime('d F Y, H:i')
                    ->timezone('Asia/Jakarta')
                    ->since()
                    ->icon('heroicon-o-clock'),
                    
                // Statistik
                TextEntry::make('courses_count')
                    ->label('Jumlah Kursus (sebagai Instruktur)')
                    ->state(fn ($record) => $record->courses()->count())
                    ->icon('heroicon-o-academic-cap')
                    ->visible(fn ($record) => in_array($record->role, ['dosen', 'kaprodi'])),
                    
                TextEntry::make('enrollments_count')
                    ->label('Kursus yang Diikuti')
                    ->state(fn ($record) => $record->courseEnrollments()->count())
                    ->icon('heroicon-o-book-open')
                    ->visible(fn ($record) => $record->role === 'mahasiswa'),
                    
                TextEntry::make('forums_count')
                    ->label('Post Forum')
                    ->state(fn ($record) => $record->forums()->count())
                    ->icon('heroicon-o-chat-bubble-left-right'),
                    
                TextEntry::make('mentorships_count')
                    ->label('Sesi Mentoring')
                    ->state(fn ($record) => $record->mentorships()->count() + $record->mentoringsSessions()->count())
                    ->icon('heroicon-o-users'),
            ])
            ->columns(2);
    }
}
