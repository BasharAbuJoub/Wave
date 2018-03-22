<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class ChangePasswordController extends Controller
{



    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        return view('auth.passwords.change');
    }

    public function change(Request $request)
    {

        $this->validate($request, [
            'old' => 'required_with:new',
            'new' => 'confirmed|max:20',
        ]);

        $user = Auth::user();

        if (Hash::check($request->old, $user->password)) {
            $user->fill([
                'password' => Hash::make($request->new)
            ])->save();

            $request->session()->flash('success', 'Password changed');
            return response('Updated', 200);
        }
        
        return response('Old password is incorrect', 422);

    }


}
