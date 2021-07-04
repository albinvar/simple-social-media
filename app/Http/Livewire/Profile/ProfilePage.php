<?php

namespace App\Http\Livewire\Profile;

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
}
