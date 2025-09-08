<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Mentorship;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MentorshipRequest extends Component
{
    public $type = '';
    public $mentor_id = '';
    public $title = '';
    public $description = '';
    public $scheduled_at = '';
    public $github_repo = '';
    public $notes = '';

    protected $rules = [
        'type' => 'required|in:coaching_clinic,mentorship_program',
        'mentor_id' => 'required|exists:users,id',
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'scheduled_at' => 'required|date|after:now',
        'github_repo' => 'nullable|url',
        'notes' => 'nullable|string',
    ];

    public function submitRequest()
    {
        $this->validate();

        Mentorship::create([
            'mentor_id' => $this->mentor_id,
            'mentee_id' => Auth::id(),
            'type' => $this->type,
            'title' => $this->title,
            'description' => $this->description,
            'scheduled_at' => $this->scheduled_at,
            'github_repo' => $this->github_repo,
            'notes' => $this->notes,
            'status' => 'pending',
        ]);

        session()->flash('message', 'Permintaan mentorship berhasil dikirim!');
        
        $this->reset();
    }

    public function render()
    {
        $mentors = User::where('role', 'dosen')
            ->orWhere('role', 'admin')
            ->orderBy('name')
            ->get();
            
        return view('livewire.mentorship-request', [
            'mentors' => $mentors
        ]);
    }
}
