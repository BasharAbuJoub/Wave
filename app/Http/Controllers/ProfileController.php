<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class ProfileController extends Controller
{   
    public function user($id){
        return view('user.show', ['userId' => $id]);
    }

    public function setRole(Request $r, User $user){
        // if(Auth::user()->role < 3)
        //     return response('Access denied',401);
        $this->validate($r, [
            'role' => 'required|int',
        ]);
        
        $user->update([
            'role' => $r->input('role')
        ]);
        return $user;
    }

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
