<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
	public function getProfile()
	{
		return View('profile');
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editProfile($id)
    {
        $user = DB::table('users')->find($id);
	

        return view('profile.edit', compact('user'));
    }

/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|max:13',
            'address1' => 'required|max:255',
            'city' => 'required|max:255',
	    'state' => 'required|max:15',
	    'zip' => 'required|max:5',
        ]);

        User::find($id)->update($request->all());
        return redirect('/profile');
    }
}