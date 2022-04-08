<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function index(): View|Factory|Application
    {
        $this->authorize('viewAny', auth()->user());

        return view('users.index');
    }

    /**
     * @throws AuthorizationException
     */
    public function edit(User $user): Factory|View|Application
    {
        $this->authorize('viewAny', auth()->user());

        return view('users.edit', compact('user'));
    }
}
