<?php

namespace App\Filament\Dosen\Resources\Mentorships\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\IconEntry;
use Filament\Schemas\Schema;

class MentorshipInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('mentee.name')
                    ->label('Mahasiswa (Mentee)')
                    ->icon('heroicon-o-user')
                    ->copyable()
                    ->weight('bold'),
                    
                TextEntry::make('type')
                    ->label('Tipe Mentorship')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'coaching_clinic' => 'info',
                        'mentorship_program' => 'success',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'coaching_clinic' => 'Coaching Clinic',
                        'mentorship_program' => 'Mentorship Program',
                        default => $state,
                    }),
                    
                TextEntry::make('title')
                    ->label('Judul Mentorship')
                    ->size('lg')
                    ->weight('bold')
                    ->copyable(),
                    
                TextEntry::make('description')
                    ->label('Deskripsi')
                    ->prose()
                    ->markdown(),
                    
                TextEntry::make('scheduled_at')
                    ->label('Jadwal')
                    ->dateTime('d M Y, H:i')
                    ->icon('heroicon-o-calendar')
                    ->color('primary'),
                    
                TextEntry::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'approved' => 'success',
                        'completed' => 'info',
                        'cancelled' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'pending' => 'Menunggu Persetujuan',
                        'approved' => 'Disetujui',
                        'completed' => 'Selesai',
                        'cancelled' => 'Dibatalkan',
                        default => $state,
                    }),
                    
                TextEntry::make('github_repo')
                    ->label('Repository GitHub')
                    ->url(fn ($state) => $state)
                    ->openUrlInNewTab()
                    ->icon('heroicon-o-code-bracket')
                    ->placeholder('Tidak ada repository')
                    ->visible(fn ($record) => !empty($record->github_repo)),
                    
                TextEntry::make('notes')
                    ->label('Catatan')
                    ->prose()
                    ->placeholder('Tidak ada catatan')
                    ->visible(fn ($record) => !empty($record->notes)),
                    
                TextEntry::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y, H:i')
                    ->icon('heroicon-o-plus-circle')
                    ->color('gray'),
                    
                TextEntry::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime('d M Y, H:i')
                    ->icon('heroicon-o-pencil')
                    ->color('gray'),
            ])
            ->columns(2);
    }
}
