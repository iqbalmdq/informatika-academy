<?php

namespace App\Filament\Dosen\Resources\Mentorships\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MentorshipForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('mentee_id')
                    ->label('Mahasiswa (Mentee)')
                    ->required()
                    ->options(User::where('role', 'mahasiswa')->pluck('name', 'id'))
                    ->searchable()
                    ->preload()
                    ->placeholder('Pilih mahasiswa')
                    ->columnSpan(1),
                    
                Select::make('type')
                    ->label('Tipe Mentorship')
                    ->required()
                    ->options([
                        'coaching_clinic' => 'Coaching Clinic',
                        'mentorship_program' => 'Mentorship Program'
                    ])
                    ->default('coaching_clinic')
                    ->native(false)
                    ->columnSpan(1),
                    
                TextInput::make('title')
                    ->label('Judul Mentorship')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Masukkan judul mentorship')
                    ->columnSpanFull(),
                    
                Textarea::make('description')
                    ->label('Deskripsi')
                    ->required()
                    ->rows(4)
                    ->maxLength(1000)
                    ->placeholder('Jelaskan tujuan dan materi yang akan dibahas dalam mentorship ini')
                    ->columnSpanFull(),
                    
                DateTimePicker::make('scheduled_at')
                    ->label('Jadwal Mentorship')
                    ->required()
                    ->native(false)
                    ->displayFormat('d/m/Y H:i')
                    ->minDate(now())
                    ->helperText('Pilih tanggal dan waktu untuk sesi mentorship')
                    ->columnSpan(1),
                    
                Select::make('status')
                    ->label('Status')
                    ->required()
                    ->options([
                        'pending' => 'Menunggu Persetujuan',
                        'approved' => 'Disetujui',
                        'completed' => 'Selesai',
                        'cancelled' => 'Dibatalkan'
                    ])
                    ->default('pending')
                    ->native(false)
                    ->columnSpan(1),
                    
                TextInput::make('github_repo')
                    ->label('Repository GitHub')
                    ->url()
                    ->maxLength(500)
                    ->placeholder('https://github.com/username/repository')
                    ->helperText('Link repository GitHub jika ada (opsional)')
                    ->columnSpanFull(),
                    
                Textarea::make('notes')
                    ->label('Catatan')
                    ->rows(3)
                    ->maxLength(500)
                    ->placeholder('Catatan tambahan untuk mentorship ini (opsional)')
                    ->columnSpanFull(),
            ])
            ->columns(2);
    }
}
