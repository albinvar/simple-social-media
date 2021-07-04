<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;

class ProfilePage extends Component
{
	public $user;
	
	public $followers;
	
	public $followings;
	
	public $posts;
	
	public $postsCount;
	
	public function mount()
	{
		$this->postsCount = $this->countPosts();
	}
	
    public function render()
    {
        return view('livewire.profile.profile-page');
    }
    
    
    private function countPosts()
    {
        return $this->user->posts->count();
    }

    private function countLikes()
    {
        $postsArr = $this->posts->map(function (Post $post) {
            return $post->likes_count;
        })->toArray();

        return array_sum($postsArr);
    }

    private function countComments()
    {
        $postsArr = $this->posts->map(function (Post $post) {
            return $post->comments_count;
        })->toArray();

        return array_sum($postsArr);
    }
}
