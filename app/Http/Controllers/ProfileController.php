<?php

namespace App\Http\Controllers;

use App\Models\User;

class ProfileController extends Controller
{
    protected $post;

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     *
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        $user = User::with(['isFollowed'])->withCount(['posts', 'followers', 'followings'])->where('username', $username)->firstOrFail();
        //$this->posts = Post::select('id')->where('user_id', $user->id)->withCount(['likes', 'comments'])->get();
        return view('profile', ['user' => $user]);
    }
}
