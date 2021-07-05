<?php

namespace App\Http\Livewire\Profile;

use App\Models\Follower;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class ProfilePage extends Component
{
    public $user;

    public $followers;

    public $followersCount;

    public $followings;

    public $followingsCount;

    public $posts;

    public $postsCount;

    public function mount()
    {
        $this->postsCount = $this->user->posts_count;
        $this->followersCount = $this->user->followers_count;
        $this->followingsCount = $this->user->followings_count;
    }

    public function render()
    {
        return view('livewire.profile.profile-page');
    }

    public function incrementFollow(User $user)
    {
        Gate::authorize('is-user-profile', $this->user);

        $follow = Follower::where('following_id', Auth::id())
            ->where('follower_id', $user->id);

        if (! $follow->count()) {
            $new = Follower::create([
                'following_id' => Auth::id(),
                'follower_id' => $user->id,
            ]);
        } else {
            $follow->delete();
        }

        return redirect()->route('profile', ['username' => $user->username]);
    }
}
