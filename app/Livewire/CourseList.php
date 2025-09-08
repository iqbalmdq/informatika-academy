<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;
// Contoh di komponen Livewire untuk upload
use Livewire\WithFileUploads;

class CourseList extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $search = '';
    public $level = '';

    public function render()
    {
        $courses = Course::query()
            ->where('is_published', true)
            ->when($this->search, fn($query) =>
                $query->where('title', 'like', '%' . $this->search . '%'))
            ->when($this->level, fn($query) =>
                $query->where('level', $this->level))
            ->with('instructor')
            ->paginate(12);

        return view('livewire.course-list', compact('courses'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingLevel()
    {
        $this->resetPage();
    }

    public $photo;

    public function save()
    {
        $this->validate([
            'photo' => 'image|max:1024',  // 1MB Max
        ]);

        $path = $this->photo->store('course-thumbnails', 'public');

        // Update course dengan path gambar
        Course::create(['thumbnail' => $path]);
    }
}
