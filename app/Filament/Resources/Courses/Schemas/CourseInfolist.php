<?php

namespace App\Filament\Resources\Courses\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Schemas\Schema;

class CourseInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Informasi Kursus
                TextEntry::make('title')
                    ->label('Judul Kursus')
                    ->size('lg')
                    ->weight('bold'),
                    
                IconEntry::make('is_published')
                    ->label('Status')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger'),
                    
                TextEntry::make('slug')
                    ->label('Slug URL')
                    ->copyable()
                    ->icon('heroicon-o-link'),
                    
                TextEntry::make('description')
                    ->label('Deskripsi')
                    ->markdown()
                    ->columnSpanFull(),
                    
                // Detail Akademik
                TextEntry::make('instructor.name')
                    ->label('Instruktur')
                    ->icon('heroicon-o-user')
                    ->color('info'),
                    
                TextEntry::make('level')
                    ->label('Level')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'beginner' => 'success',
                        'intermediate' => 'warning',
                        'advanced' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'beginner' => 'Pemula',
                        'intermediate' => 'Menengah',
                        'advanced' => 'Lanjutan',
                        default => $state,
                    }),
                    
                TextEntry::make('duration_hours')
                    ->label('Durasi')
                    ->suffix(' jam')
                    ->icon('heroicon-o-clock'),
                    
                TextEntry::make('price')
                    ->label('Harga')
                    ->money('IDR')
                    ->icon('heroicon-o-banknotes')
                    ->color('success'),
                    
                // Media - Gambar Thumbnail dengan CDN yang sesuai tema
                ImageEntry::make('thumbnail')
                    ->label('Thumbnail Course')
                    ->state(function ($record) {
                        return self::generateThemeBasedImage($record->title, $record->level);
                    })
                    ->size(300)
                    ->square(false)
                    ->extraAttributes(['class' => 'rounded-lg shadow-md']),
                    
                TextEntry::make('thumbnail')
                    ->label('URL Thumbnail')
                    ->state(function ($record) {
                        return self::generateThemeBasedImage($record->title, $record->level);
                    })
                    ->copyable()
                    ->placeholder('Gambar otomatis berdasarkan tema')
                    ->icon('heroicon-o-photo'),
                    
                // Statistik & Waktu
                TextEntry::make('modules_count')
                    ->label('Jumlah Modul')
                    ->state(fn ($record) => $record->modules()->count())
                    ->icon('heroicon-o-book-open')
                    ->color('info'),
                    
                TextEntry::make('students_count')
                    ->label('Jumlah Siswa')
                    ->state(fn ($record) => $record->enrollments()->count())
                    ->icon('heroicon-o-users')
                    ->color('success'),
                    
                TextEntry::make('forums_count')
                    ->label('Diskusi Forum')
                    ->state(fn ($record) => $record->forums()->count())
                    ->icon('heroicon-o-chat-bubble-left-right')
                    ->color('warning'),
                    
                TextEntry::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d F Y, H:i')
                    ->timezone('Asia/Jakarta')
                    ->icon('heroicon-o-calendar'),
                    
                TextEntry::make('updated_at')
                    ->label('Terakhir Diperbarui')
                    ->dateTime('d F Y, H:i')
                    ->timezone('Asia/Jakarta')
                    ->since()
                    ->icon('heroicon-o-clock'),
                    
                // Modul Kursus
                TextEntry::make('modules')
                    ->label('Modul Kursus')
                    ->listWithLineBreaks()
                    ->bulleted()
                    ->formatStateUsing(function ($record) {
                        return $record->modules->map(function ($module, $index) {
                            $status = $module->is_published ? '✅' : '❌';
                            return ($index + 1) . ". {$module->title} {$status}";
                        })->implode("\n"); // ← Use implode() to return a string
                    })
                    ->placeholder('Belum ada modul')
                    ->columnSpanFull(),
            ]);
    }
    
    /**
     * Generate theme-based image URL from CDN based on course title and level
     */
    private static function generateThemeBasedImage(string $title, string $level): string
    {
        // Tentukan warna berdasarkan level
        $levelColors = [
            'beginner' => '22C55E',    // Green
            'intermediate' => 'F59E0B', // Orange  
            'advanced' => 'EF4444',     // Red
        ];
        
        $color = $levelColors[$level] ?? '6B7280'; // Default gray
        
        // Tentukan tema berdasarkan kata kunci dalam judul
        $themes = [
            'programming' => ['programming', 'coding', 'development', 'developer', 'code'],
            'web' => ['web', 'html', 'css', 'javascript', 'frontend', 'backend', 'fullstack'],
            'mobile' => ['mobile', 'android', 'ios', 'flutter', 'react native'],
            'data' => ['data', 'database', 'sql', 'analytics', 'big data'],
            'ai' => ['ai', 'machine learning', 'deep learning', 'artificial intelligence', 'ml'],
            'algorithm' => ['algorithm', 'struktur data', 'algorithms', 'data structure'],
            'design' => ['design', 'ui', 'ux', 'graphic', 'photoshop'],
            'network' => ['network', 'networking', 'security', 'cyber'],
            'game' => ['game', 'gaming', 'unity', 'unreal'],
        ];
        
        $detectedTheme = 'programming'; // default
        $titleLower = strtolower($title);
        
        foreach ($themes as $theme => $keywords) {
            foreach ($keywords as $keyword) {
                if (strpos($titleLower, $keyword) !== false) {
                    $detectedTheme = $theme;
                    break 2;
                }
            }
        }
        
        // Generate URL berdasarkan tema
        $themeTexts = [
            'programming' => 'Programming',
            'web' => 'Web+Dev',
            'mobile' => 'Mobile+App',
            'data' => 'Database',
            'ai' => 'AI+ML',
            'algorithm' => 'Algorithms',
            'design' => 'UI+Design',
            'network' => 'Network',
            'game' => 'Game+Dev',
        ];
        
        $themeText = $themeTexts[$detectedTheme] ?? 'Course';
        
        // Gunakan Unsplash untuk gambar yang lebih berkualitas
        $unsplashKeywords = [
            'programming' => 'computer-programming-code',
            'web' => 'web-development-laptop',
            'mobile' => 'mobile-app-development',
            'data' => 'database-server-technology',
            'ai' => 'artificial-intelligence-brain',
            'algorithm' => 'algorithm-flowchart',
            'design' => 'ui-ux-design-creative',
            'network' => 'network-security-technology',
            'game' => 'game-development-controller',
        ];
        
        $keyword = $unsplashKeywords[$detectedTheme] ?? 'technology-education';
        
        // Return Unsplash image dengan ukuran 800x600
        return "https://images.unsplash.com/photo-1461749280684-dccba630e2f6?w=800&h=600&fit=crop&crop=center&auto=format&q=80";
        
        // Alternative: jika ingin menggunakan placeholder dengan tema
        // return "https://via.placeholder.com/800x600/{$color}/FFFFFF?text={$themeText}";
    }
}
