<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('post.manage');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function followers(): Application|Factory|View
    {
        return view('post.followers');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreatePostRequest $request
     *
     * @return void
     */
    public function store(CreatePostRequest $request): void
    {
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     *
     * @return void
     */
    public function show(Post $post): void
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     *
     * @return Application|Factory|View
     */
    public function edit(Post $post): View|Factory|Application
    {
        return view('post.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Post $post
     *
     * @return void
     */
    public function update(Request $request, Post $post): void
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     *
     * @return void
     */
    public function destroy(Post $post): void
    {
    }
}
