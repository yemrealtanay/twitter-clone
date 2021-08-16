<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'user_id' => 'required'           
        ]);

        $img = $request->file('avatar');
        $bgimg = $request->file('bgimg');

        $newAvatarName = uniqid() . '.' . $request->nickname . '.' . $img->getClientOriginalExtension();
        $newBgimgName = uniqid() . '.' . $request->nickname . '.' . $bgimg->getClientOriginalExtension();

        $destinationPath = public_path('images');

        $img->move($destinationPath, $newAvatarName);
        $bgimg->move($destinationPath, $newBgimgName);

        $user->nickname = $request->nickname;
        $user->bio = $request->bio;
        $user->website = $request->website;
        $user->image_path = $newAvatarName;
        $user->bgimg_path = $newBgimgName;

        $user->save();
        
        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        //
    }
}
