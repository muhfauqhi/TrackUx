<?php

namespace App\Http\Controllers;
use App\User;
use Storage;

use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function edit()
    {
        return view('dashboard.edit');
    }

    public function destroy(Request $request)
    {
        if($request->user()->avatar)
        {
            Storage::delete($request->user()->avatar);
        }
        
        $request->user()->update([
            'avatar' => null
        ]);
        
        return redirect()->back()->with('success', 'Avatar Deleted!');
    }

    public function update(Request $request, User $user)
    {
        $this->validate(request(), [
            'name' => 'required|min:5',
            'email' => 'email|required',
            'phone' => 'numeric|required|min:11',
            'gender' => 'required',
            'address' => 'min:10',
            'avatar' => 'image|required'
        ]);

        if($request->user()->avatar)
        {
            Storage::delete($request->user()->avatar);
        }

        $input = $request->all();
        $avatar = $request->file('avatar')->store('avatars');

        $request->user()->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'avatar' => $avatar
        ]);

        return redirect()->back()->with('success', 'Profile Updated!');
    }
}
