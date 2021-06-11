<?php

namespace App\Http\Livewire\Posts;

use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;
use App\Models\Media;
use App\Models\Like;
use App\Models\Comment;
use Auth;

class View extends Component
{
	use WithPagination;
	
	public $comments = [];
	
	public $comment;
	
	public $postId;
	
	public $isOpenCommentModal = 0;
	
    public function render()
    {
    	$posts = Post::with(['likes', 'userLikes'])->latest()->paginate(10);
        return view('livewire.posts.view', ['posts' => $posts]);
    }
    
    public function incrementLike(Post $post)
    {
	    $like = Like::where('user_id', Auth::id())
					->where('post_id', $post->id);
					
	    if(!$like->count())
		{
			$new = Like::create([
				'post_id' => $post->id,
				'user_id' => Auth::id(),
			]);
			
			return true;
		} else {
			$like->delete();
		}
    }
    
    public function comments(Post $post)
    {
    	$this->comment = '';
		$this->postId = $post->id;
	    
    	$this->isOpenCommentModal = true;
	    $this->comments = $post->comments;
		return true;
    }
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function createComment($id)
    {
    	$validatedData = Validator::make(
            ['comment' => $this->comment],
            ['comment' => 'required|max:5000']
        )->validate();
        
	    Comment::create([
			'user_id' => Auth::id(),
			'post_id' => $this->postId,
			'comment' => $validatedData['comment'],
		]);
		
		$this->resetValidation('comment');
		$this->isOpenCommentModal = false;
		return redirect()->back();
	
    }
  
    
    public function openModal()
    {
        $this->isOpen = true;
    }
  
    
    public function closeModal()
    {
        $this->isOpen = false;
    }
  
    
}
