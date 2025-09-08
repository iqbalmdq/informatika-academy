<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relationships
    public function courses(): HasMany
    {
        return $this->hasMany(Course::class, 'instructor_id');
    }

    public function enrollments(): BelongsToMany
    {
        return $this
            ->belongsToMany(Course::class, 'course_enrollments')
            ->withTimestamps();
    }

    public function forums(): HasMany
    {
        return $this->hasMany(Forum::class);
    }

    public function mentorships(): HasMany
    {
        return $this->hasMany(Mentorship::class, 'mentee_id');
    }

    public function mentoringsSessions(): HasMany
    {
        return $this->hasMany(Mentorship::class, 'mentor_id');
    }

    /**
     * Get the course enrollments for the user.
     */
    public function courseEnrollments(): HasMany
    {
        return $this->hasMany(CourseEnrollment::class);
    }

    /**
     * Get the enrolled courses for the user.
     */
    public function enrolledCourses(): BelongsToMany
    {
        return $this
            ->belongsToMany(Course::class, 'course_enrollments')
            ->withPivot(['enrolled_at', 'progress', 'completed_at'])
            ->withTimestamps();
    }

    public function canAccessPanel(Panel $panel): bool
    {
        // Allow access based on user role and active status
        if (!$this->is_active) {
            return false;
        }

        // Allow access to different panels based on role
        switch ($panel->getId()) {
            case 'kaprodi':
                return $this->role === 'kaprodi' || $this->role === 'staff';
            case 'dosen':
                return $this->role === 'dosen';
            case 'mahasiswa':
                return $this->role === 'mahasiswa';
            default:
                return false;
        }
    }
}
