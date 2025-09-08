<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'content', 'user_id', 'course_id', 'category', 'is_pinned', 'is_closed'
    ];

    protected function casts(): array
    {
        return [
            'is_pinned' => 'boolean',
            'is_closed' => 'boolean',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function replies()
    {
        return $this->hasMany(ForumReply::class);
    }
}