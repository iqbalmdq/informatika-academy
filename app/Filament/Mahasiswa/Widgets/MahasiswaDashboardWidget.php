<?php

namespace App\Filament\Mahasiswa\Widgets;

use App\Models\Course;
use App\Models\Forum;
use App\Models\Mentorship;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;

class MahasiswaDashboardWidget extends BaseWidget
{
    protected function getStats(): array
    {
        $userId = Auth::id();
        
        return [
            Stat::make('Kursus Diikuti', $this->getEnrolledCoursesCount())
                ->description('Kursus yang sedang diikuti')
                ->descriptionIcon('heroicon-m-academic-cap')
                ->color('primary'),
            
            Stat::make('Progress Belajar', $this->getProgressPercentage() . '%')
                ->description('Rata-rata kemajuan')
                ->descriptionIcon('heroicon-m-chart-bar')
                ->color('success'),
            
            Stat::make('Mentorship Aktif', Mentorship::where('mentee_id', $userId)->where('status', 'approved')->count())
                ->description('Sesi mentoring')
                ->descriptionIcon('heroicon-m-user-plus')
                ->color('info'),
            
            Stat::make('Forum Posts', Forum::where('user_id', $userId)->count())
                ->description('Kontribusi forum')
                ->descriptionIcon('heroicon-m-chat-bubble-left-right')
                ->color('warning'),
        ];
    }
    
    private function getEnrolledCoursesCount(): int
    {
        // Placeholder - adjust based on your enrollment model
        return Course::where('is_published', true)->count();
    }
    
    private function getProgressPercentage(): int
    {
        // Placeholder - calculate based on completed modules
        return rand(60, 95); // Remove this and implement actual progress calculation
    }
}