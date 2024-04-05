<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data = User::query()->latest('id')->paginate(5);
        return view('admin.users.index', compact('data'));
    }
    public function create()
    {
      
        return view('admin.users.create'); 
    }
    public function store(Request $request)
    {
        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $pathFile = Storage::putFile('users', $request->file('image'));
            $data['image'] = 'storage/' . $pathFile;
        }
        $data['email_verified_at'] = now();
        $data['remember_token'] = Str::random(10);
        User::query()->create($data);
        return redirect()->route('users.index');
    }
    public function show(User $user)
    {
 
        return view('admin.users.show', compact('user'));
    }
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $pathFile = Storage::putFile('categories', $request->file('image'));
            $data['image'] = 'storage/' . $pathFile;
        }

        $currentImage = $user->image;
        $user->update($data);
        if ($request->hasFile('image') && $currentImage && file_exists(public_path($currentImage))) {
            unlink(public_path($currentImage));
        }
        return back();
    }
    public function destroy(User $user)
    {
        $user->delete();
        if ($user->image && file_exists(public_path($user->image))) {
            unlink(public_path($user->image));
        }
        return redirect()->route('users.index');
    }

}
