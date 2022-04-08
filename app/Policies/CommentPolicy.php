<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class CommentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     *
     * @return mixed
     */
    public function viewAny(User $user)
    {
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Comment $comment
     *
     * @return mixed
     */
    public function view(User $user, Comment $comment)
    {
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     *
     * @return mixed
     */
    public function create(User $user)
    {
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Comment $comment
     *
     * @return mixed
     */
    public function update(User $user, Comment $comment)
    {
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Comment $comment
     *
     * @return mixed
     */
    public function delete(User $user, Comment $comment, Post $post)
    {
        return auth()->user()->role_id === 2 || $comment->user->id === auth()->id() || $post->user->id === auth()->id()
                    ? Response::allow()
                    : Response::deny('You do not own this comment.');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Comment $comment
     *
     * @return mixed
     */
    public function restore(User $user, Comment $comment)
    {
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Comment $comment
     *
     * @return mixed
     */
    public function forceDelete(User $user, Comment $comment)
    {
    }
}
