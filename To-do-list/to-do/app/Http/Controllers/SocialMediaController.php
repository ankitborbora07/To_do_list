<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Session;

class SocialMediaController extends Controller
{
    function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();

 }

 public function callbackGoogle()
 {
    
     try {
         //dd(1213);
         // Retrieve user information from Google
         $googleUser = Socialite::driver('google')->user();
             //dd(123);
         // Check if the user already exists in the database
         $user = User::where('email', $googleUser->getEmail())->first();
 
         if (!$user) {
 
             try {
                 $newUser = User::create([
                     'name' => $googleUser->getName(),
                     'email' => $googleUser->getEmail(),
                    'password'=>null,
                     
                 ]);

                 $user = User::where('email', $googleUser->getEmail())->first();
                 Session::put('loginId', $user->id);
                 
             } catch (\Exception $e) {
                 dd($e->getMessage());
             }
             
            
         } else {
             //dd(123);
             //Auth::login($user);
             Session::put('loginId', $user->id);
         }
 
         // Redirect to the intended URL after login
         return redirect()->intended('dashboard');
     } catch (\Exception $e) {
         // Handle exceptions
         return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
     }
   }
   function redirectToFacebook()
   {
    
       return Socialite::driver('facebook')->redirect();

}
public function callbackFacebook()
{
    // dd(123);
    try {
    //    dd(1213);
        // Retrieve user information from Google
        $fbUser = Socialite::driver('facebook')->user();
           // dd($googleUser);
        // Check if the user already exists in the database
        $user = User::where('email', $fbUser->getEmail())->first();

        if (!$user) {

            try {
                $newUser = User::create([
                    'name' => $fbUser->getName(),
                    'email' => $fbUser->getEmail(),
                    
                    'password'=>null,
                    
                ]);

                $user = User::where('email', $fbUser->getEmail())->first();
                Session::put('loginId', $user->id);
                
            } catch (\Exception $e) {
                dd($e->getMessage());
            }
            
           
        } else {
            //dd(123);
            //Auth::login($user);
            Session::put('loginId', $user->id);
        }

        // Redirect to the intended URL after login
        return redirect()->intended('dashboard');
    } catch (\Exception $e) {
        // Handle exceptions
        return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
    }
  }
}
