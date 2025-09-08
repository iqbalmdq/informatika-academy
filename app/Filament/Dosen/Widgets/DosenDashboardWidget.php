<?php

namespace App\Filament\Dosen\Widgets;

use App\Models\Course;
use App\Models\Forum;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;

class DosenDashboardWidget extends BaseWidget
{
    protected function getStats(): array
    {
        $userId = Auth::id();
        
        return [
            Stat::make('Kursus Saya', Course::where('instructor_id', $userId)->count())
                ->description('Kursus yang diajar')
                ->descriptionIcon('heroicon-m-book-open')
                ->color('primary'),
            
            Stat::make('Mahasiswa Aktif', $this->getActiveMahasiswaCount())
                ->description('Mengikuti kursus saya')
                ->descriptionIcon('heroicon-m-users')
                ->color('success'),
            
            Stat::make('Forum Posts', Forum::where('user_id', $userId)->count())
                ->description('Postingan forum')
                ->descriptionIcon('heroicon-m-chat-bubble-left-right')
                ->color('info'),
            
            Stat::make('Kursus Published', Course::where('instructor_id', $userId)->where('is_published', true)->count())
                ->description('Kursus aktif')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('warning'),
        ];
    }
    
    private function getActiveMahasiswaCount(): int
    {
        // Assuming there's an enrollments table or similar
        // This is a placeholder - adjust based on your actual enrollment model
        return User::where('role', 'mahasiswa')->where('is_active', true)->count();
    }
}