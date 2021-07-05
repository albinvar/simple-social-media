<?php

namespace App\Http\Livewire\Posts;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;

class View extends Component
{
    use WithPagination;

    public $comments = [];

    public $comment;

    public $type;

    public $queryType;

    public $postId;

    public $deletePostId;

    public $isOpenCommentModal = false;

    public $isOpenDeletePostModal = false;

    public function mount($type = null)
    {
        $this->queryType = $type;
    }

    public function render()
    {
        $posts = $this->setQuery();

        return view('livewire.posts.view', ['posts' => $posts]);
    }

    public function incrementLike(Post $post)
    {
        $like = Like::where('user_id', Auth::id())
            ->where('post_id', $post->id);

        if (! $like->count()) {
            $new = Like::create([
                'post_id' => $post->id,
                'user_id' => Auth::id(),
            ]);

            return true;
        }
        $like->delete();
    }

    public function comments($post)
    {
        $post = Post::with(['comments.user' => function ($query) {
            $query->select('id', 'name');
        },
        ])->find($post);
        $this->postId = $post->id;
        $this->resetValidation('comment');
        $this->isOpenCommentModal = true;
        $this->setComments($post);
        return true;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function createComment(Post $post)
    {
        $validatedData = Validator::make(
            ['comment' => $this->comment],
            ['comment' => 'required|max:5000']
        )->validate();

        Comment::create([
            'user_id' => Auth::id(),
            'post_id' => $post->id,
            'comment' => $validatedData['comment'],
        ]);

        session()->flash('comment.success', 'Comment created successfully');

        $this->setComments($post);
        $this->comment = '';

        //$this->isOpenCommentModal = false;
        return redirect()->back();
    }

    public function setComments($post)
    {
        $this->comments = $post->comments;
        return true;
    }

    public function showDeletePostModal(Post $post)
    {
        $this->deletePostId = $post->id;
        $this->isOpenDeletePostModal = true;
    }

    public function deletePost(Post $post)
    {
        $response = Gate::inspect('delete', $post);

        if ($response->allowed()) {
            try {
                $post->delete();
                session()->flash('success', 'Post deleted successfully');
            } catch (\Exception $e) {
                session()->flash('error', 'Cannot delete post');
            }
        } else {
            session()->flash('error', $response->message());
        }
        $this->isOpenDeletePostModal = false;
        return redirect()->back();
    }

    public function deleteComment(Post $post, Comment $comment)
    {
        $response = Gate::inspect('delete', [$comment, $post]);

        if ($response->allowed()) {
            $comment->delete();
            $this->isOpenCommentModal = false;
            session()->flash('success', 'Comment deleted successfully');
        } else {
            session()->flash('comment.error', $response->message());
        }

        return redirect()->back();
    }

    private function setQuery()
    {
        if (! empty($this->queryType) && $this->queryType === 'me') {
            $posts = Post::withCount(['likes', 'comments'])->where('user_id', Auth::id())->with(['userLikes', 'postImages', 'user' => function ($query) {
                $query->select(['id', 'name', 'username', 'profile_photo_path']);
            },
            ])->latest()->paginate(10);
        } else {
            $posts = Post::withCount(['likes', 'comments'])->with(['userLikes', 'postImages', 'user' => function ($query) {
                $query->select(['id', 'name', 'username', 'profile_photo_path']);
            },
            ])->latest()->paginate(10);
        }

        return $posts;
    }
}
