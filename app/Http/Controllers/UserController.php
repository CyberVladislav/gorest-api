<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\GorestService;

class UserController extends Controller
{
    protected GorestService $gorestService;

    public function __construct(GorestService $gorestService)
    {
        $this->gorestService = $gorestService;
    }

    public function index()
    {
        $this->authorize(User::ACTION_LOOK, User::class);

        return view('users', [
            'users' => $this->gorestService->getUsers(),
        ]);
    }

    public function destroy(int $id)
    {
        $this->authorize(User::ACTION_DELETE, User::class);

        $this->gorestService->deleteUser($id);

        return back()->with('success', 'User deleted');
    }
}
