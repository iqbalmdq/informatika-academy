<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\CourseEnrollment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CourseDetail extends Component
{
    public Course $course;
    public $isEnrolled = false;
    public $enrollment = null;

    public function mount($slug)
    {
        $this->course = Course::with(['instructor', 'modules'])
            ->where('slug', $slug)
            ->firstOrFail();
            
        $this->checkEnrollmentStatus();
    }

    public function checkEnrollmentStatus()
    {
        if (Auth::check()) {
            $this->enrollment = CourseEnrollment::where('user_id', Auth::id())
                ->where('course_id', $this->course->id)
                ->first();
                
            $this->isEnrolled = !is_null($this->enrollment);
        }
    }

    public function enroll()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if ($this->isEnrolled) {
            return;
        }

        CourseEnrollment::create([
            'user_id' => Auth::id(),
            'course_id' => $this->course->id,
            'enrolled_at' => now(),
            'progress' => 0,
        ]);

        $this->checkEnrollmentStatus();
        
        session()->flash('message', 'Berhasil mendaftar ke kursus!');
    }

    public function render()
    {
        return view('livewire.course-detail');
    }
}
