<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Intervention\Image\Facades\Image;

class ProfilesControler extends Controller
{
    //
    public function index($user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user) : false;

        $user = User::findOrFail($user);
        return view('profiles.index',
        [ 'user' => $user, 'follows' => $follows ]   );
    }

    public function edit(User $user){

        $this->authorize('update',$user->profile);

        return view('profiles.edit',compact('user'));
    }

    public function update(User $user){

        $this->authorize('update',$user->profile);
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => '',
            'image' => ''
        ]);

        if (request('image')) {
            $imagePath = request('image')->store('profiles', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(900, 900);
            $image->save();

            $imagearray =  ['image' => $imagePath];
        }
        auth()->user()->profile->update(array_merge(
            $data,
            $imagearray ?? []
        ));

        return redirect("/profile/{$user->id}");

    }
}
