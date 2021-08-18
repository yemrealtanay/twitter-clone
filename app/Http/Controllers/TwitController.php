<?php

namespace App\Http\Controllers;

use App\Models\Twit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class TwitController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userIds = $request->user()->followings()->pluck('id')->toArray();
        $userIds[] = $request->user()->id;
        $twits = Twit::with(['user'])->whereIn('user_id', $userIds)->orderBy('created_at', 'desc')->get();

        return view('twit.index', compact('twits'));
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
        $request->validate([
            'content' => 'required|max:140',
        ]);

        $twit = new Twit;
        $twit->user_id = $request->user()->id;
        $twit->content = $request->content;

        $twit->save();

        return redirect('/dashboard');
    }

    public function retwit(Request $request, Twit $twit)
    {
        $request->user()->profile_feed()->attach($twit);
        return redirect('/dashboard');
    }

    public function like(Request $request, Twit $twit)
    {
        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Twit  $twit
     * @return \Illuminate\Http\Response
     */
    public function show(Twit $twit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Twit  $twit
     * @return \Illuminate\Http\Response
     */
    public function edit(Twit $twit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Twit  $twit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Twit $twit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Twit  $twit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Twit $twit)
    {
        //
    }
}
