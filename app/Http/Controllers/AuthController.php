<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {

        return view ('auth.login');
    }

    public function login(Request $request): RedirectResponse
     {
         $credentials= $request->validate([
        'email' => 'required|email',
        'password' => 'required',
      ]);
      if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        return redirect()->route('projects.index');
      }
      return back()->withErrors(['email' => 'Invalids']);
    } 

    // show the form to change the user's name and email

    public function showChangeInfoForm()
    {
      return view ('auth.settings.info');
    }

    //update user's name and email
    
    //  

    // the form to change the user's password

    public function showChangePasswordForm()
    {
      return view('auth.settings.password');
    }

  //   //update the user's password
    public function updatePassword(Request $request)
    {
      $this->validate($request,[
        'current_password'=> 'required|string',
        'password'=>'required|string|min:8|confirmed',
      ]);
      $admin->auth()->user();
    
  
     if(!Hash::check($request->input('current_password'),$user_password))
     {
      return redirect()->back()->withErrors(['current_password'=>'current password invalid']);
     } 
    $admin->update([
      'password'=>Hash::make($request->input('passowrd')),
    ]);
    return redirect()->back()->with('success','password updated successfuly');
  
  } 

     //logout
      
    public function logout(Request $request){
      Auth::logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();
      return redirect('/');
    }

  }