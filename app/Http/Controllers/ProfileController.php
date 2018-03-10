<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    //
    public function edit(){
        return view('profile.edit', ['user' => Auth::user()]);
    }

    public function update(Request $request){

        $this->validate($request, [
            'name'  => 'required|string',
            'bio'   => 'required|string',
        ]);
        
        $user = Auth::user()->update([
            'name'  => $request->name,
            'bio'   => $request->bio,
        ]);

        return response('Updated', 200);

    }

}
