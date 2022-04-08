<?php

namespace App\Http\Livewire\Users;

use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Edit extends Component
{
    public $user;

    public $name;

    public $email;

    public $username;

    public $password;

    public $is_private;

    public $role_id;

    public $password_confirmation;

    public function mount()
    {
        $this->name = $this->user->name;
        $this->username = $this->user->username;
        $this->email = $this->user->email;
        $this->role_id = $this->user->role_id;
        $this->is_private = $this->user->is_private;
        $this->password = null;
        $this->password_confirmation = null;
    }

    public function render()
    {
        return view('livewire.users.edit');
    }

    public function submit()
    {
        $this->validate([
            'name' => ['required', 'max:50'],
            'username' => ['string', 'max:60', Rule::unique('users')->ignore($this->user->id)],
            'email' => ['required', 'max:225', Rule::unique('users')->ignore($this->user->id)],
            'is_private' => ['nullable', 'in:0,1'],
            'role_id' => ['required', 'in:1,2'],
            'password' => 'nullable|string|max:225|confirmed',
        ]);

        $this->user->name = $this->name;
        $this->user->email = $this->email;
        $this->user->username = $this->username;
        $this->user->role_id = $this->role_id;

        if (! is_null($this->is_private)) {
            $this->user->is_private = $this->is_private;
        }

        if (! empty($this->password)) {
            $this->user->password = Hash::make($this->password);
        }

        try {
            $this->user->update();
            return redirect()->route('users.index');
        } catch (Exception $e) {
            return redirect()->back();
        }
    }
}
