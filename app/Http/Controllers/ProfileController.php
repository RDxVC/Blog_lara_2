<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Validation\Rule;
use Auth;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
      $user = Auth::user();
      return view('pages.profile', compact('user'));
    }

    public function store(Request $request)
    {
      $this->validate($request, [
        'name' => 'required',
        'email' => ['required',
                    'email',
                    Rule::unique('users')->ignore(Auth::user()->id)],
        'avatar' => 'nullable|image'
      ]);
      $user = Auth::user();
      $user->edit($request->all());
      $user->generatePassword($request->get('password'));
      $user->uploadAvatar($request->file('avatar'));
      $user->setDescription($request->get('description'));
        return redirect()->back()->with('status', 'Профиль успешно обновлен!');
    }
}
