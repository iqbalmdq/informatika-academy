<?php

namespace App\Livewire;

use App\Models\Forum;
use Livewire\Component;
use Livewire\WithPagination;

class ForumList extends Component
{
    use WithPagination;

    public function render()
    {
        $forums = Forum::with('user')
            ->orderBy('is_pinned', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        return view('livewire.forum-list', [
            'forums' => $forums
        ]);
    }
}
