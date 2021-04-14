<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Profile $profile)
    {
        return view('home');
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
    public function store(Profile $profile)
    {
        $data = request()->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'email' => 'required',
        ]);
        
        auth()->user()->profile()->create($data);
        return redirect('/profile/'.auth()->user()->id)->with('profile',$data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('profile.index')->with(compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //dd(auth()->user()->profile());
        return view('profile.edit')->with(compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        $data = request()->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'email' => 'required',
        ]);
        auth()->user()->profile()->update($data);
        return redirect('/profile/'.auth()->user()->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }

    public function storepwd(Request $request)
    {
        $user = auth()->user()->id;
        $oldPassword = Hash::make($request->input('opassword'));
        $newPassword = Hash::make($request->input('npassword'));
        $dbPassword = auth()->user()->password;
        dd([$dbPassword,$oldPassword]);
    
        if($oldPassword != $dbPassword)
        {
            auth()->user()->password = $newPassword;
            auth()->user()->save();
            return redirect('/profile/'.$user);
        }
    }

    public function changePwd()
    {
        return view('profile.changepwd');
    }
}
