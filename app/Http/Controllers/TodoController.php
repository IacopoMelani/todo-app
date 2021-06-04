<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function index(Request $request)
    {
        /** @var User $currentUser */
        $currentUser = Auth::user();

        $todos = $currentUser->todos()
            ->orderBy('is_completed')
            ->orderByDesc('priority')
            ->orderByDesc('created_at')
            ->paginate(15);

        return view('todos', ['todos' => $todos]);
    }

    public function store(Request $request)
    {
    }

    public function update(Request $request)
    {
    }
}
