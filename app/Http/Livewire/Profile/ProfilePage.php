<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;
use App\Models\User;
use App\Models\Follower;
use Auth;

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
		$this->postsCount = $this->countPosts();
		$this->followersCount = $this->countFollowers();
		$this->followingsCount = $this->countFollowing();
	}
	
    public function render()
    {
        return view('livewire.profile.profile-page');
    }
    
    
    private function countPosts()
    {
        return $this->user->posts->count();
    }

    private function countFollowers()
    {
        return $this->user->followers->count();
    }
    
    private function countFollowing()
    {
        return $this->user->followings->count();
    }
    
    public function incrementFollow(User $user)
    {
        $follow = Follower::where('following_id', Auth::id())
            ->where('follower_id', $user->id);
            
        if (! $follow->count()) {
            $new = Follower::create([
                'following_id' => Auth::id(),
                'follower_id' => $user->id,
            ]);
            return true;
        }
        
        $follow->delete();
    
    }
}
