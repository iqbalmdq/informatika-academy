<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Course;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class KaprodiStatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Mahasiswa', User::where('role', 'mahasiswa')->count())
                ->description('Mahasiswa aktif')
                ->descriptionIcon('heroicon-m-academic-cap')
                ->color('success'),
            
            Stat::make('Total Dosen', User::where('role', 'dosen')->count())
                ->description('Dosen pengajar')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('info'),
            
            Stat::make('Total Kursus', Course::count())
                ->description('Kursus tersedia')
                ->descriptionIcon('heroicon-m-book-open')
                ->color('warning'),
            
            Stat::make('Kursus Aktif', Course::where('is_published', true)->count())
                ->description('Kursus yang dipublikasi')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('primary'),
        ];
    }
}