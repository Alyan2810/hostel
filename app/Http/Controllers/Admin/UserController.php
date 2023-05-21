<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EditUserRequest;
use App\Http\Requests\Admin\CreateUserRequest;


class UserController extends Controller
{
   
    public function index()
    {
        
        //if(auth()->user()->is_admin == 1)
        if(auth()->user()->role_id == Role::IS_ADMIN)
        {
            $users = User::paginate(20);
            return view('admin.users.index', compact('users'));
        }
        else
        {
            return redirect('/');
        }
       
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(CreateUserRequest $request)
    {
        User::create($request->validated());

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(EditUserRequest $request, User $user)
    {
        $user->update($request->validated());

        return redirect()->route('admin.users.index');
    }

    public function destroy(User $user)
    {
        // foreach ($tag->posts as $post) {
        //     $post->tags()->detach();
        // }

        // if (!$tag->posts()->count()) {
        //     $tag->delete();
        // }

        return redirect()->route('admin.users.index');
    }
}
