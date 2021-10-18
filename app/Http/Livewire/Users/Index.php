<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public $users;

    public function mount()
    {
        $this->users = User::withCount(['posts', 'followers', 'followings'])->latest()->get();
    }

    public function render()
    {
        return view('livewire.users.index');
    }
}
