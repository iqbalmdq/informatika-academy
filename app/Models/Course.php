<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'description', 'thumbnail', 'instructor_id',
        'level', 'duration_hours', 'price', 'is_published'
    ];

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
            'price' => 'decimal:2',
        ];
    }

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($course) {
            $course->slug = Str::slug($course->title);
        });
    }

    // Relationships
    public function instructor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function modules(): HasMany
    {
        return $this->hasMany(Module::class)->orderBy('order');
    }

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'course_enrollments')
                    ->withTimestamps();
    }

    public function forums(): HasMany
    {
        return $this->hasMany(Forum::class);
    }

    /**
     * Get the enrollments for the course.
     */
    public function enrollments(): HasMany
    {
        return $this->hasMany(CourseEnrollment::class);
    }
    
    /**
     * Get the enrolled students for the course.
     */
    public function enrolledStudents(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'course_enrollments')
                    ->withPivot(['enrolled_at', 'progress', 'completed_at'])
                    ->withTimestamps();
    }
    
    /**
     * Get thumbnail URL with automatic theme-based fallback
     */
    public function getThumbnailUrlAttribute(): string
    {
        if (!empty($this->thumbnail)) {
            return $this->thumbnail;
        }
        
        return $this->generateThemeBasedImage();
    }
    
    /**
     * Generate theme-based image URL from CDN
     */
    private function generateThemeBasedImage(): string
    {
        // Sama seperti fungsi di CourseInfolist
        $levelColors = [
            'beginner' => '22C55E',
            'intermediate' => 'F59E0B', 
            'advanced' => 'EF4444',
        ];
        
        $color = $levelColors[$this->level] ?? '6B7280';
        
        $themes = [
            'programming' => ['programming', 'coding', 'development'],
            'web' => ['web', 'html', 'css', 'javascript'],
            'mobile' => ['mobile', 'android', 'ios', 'flutter'],
            'data' => ['data', 'database', 'sql'],
            'ai' => ['ai', 'machine learning', 'ml'],
        ];
        
        $detectedTheme = 'programming';
        $titleLower = strtolower($this->title);
        
        foreach ($themes as $theme => $keywords) {
            foreach ($keywords as $keyword) {
                if (strpos($titleLower, $keyword) !== false) {
                    $detectedTheme = $theme;
                    break 2;
                }
            }
        }
        
        // Gunakan Unsplash dengan tema yang sesuai
        $unsplashIds = [
            'programming' => '1461749280684-dccba630e2f6',
            'web' => '1498050108023-c5249f4df085', 
            'mobile' => '1512941937669-90a1b58e7e9c',
            'data' => '1544383835-bda2bc66a55d',
            'ai' => '1555255707-c07be9b2e38e',
        ];
        
        $photoId = $unsplashIds[$detectedTheme] ?? $unsplashIds['programming'];
        
        return "https://images.unsplash.com/photo-{$photoId}?w=800&h=600&fit=crop&crop=center&auto=format&q=80";
    }
}