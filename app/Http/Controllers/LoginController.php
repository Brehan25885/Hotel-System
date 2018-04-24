<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\User;
use Auth;
class LoginController extends Controller
{
    //
    public function login(Request $request){
   
 if(Auth::attempt(
    [
     'email'=>$request->email,
    'password'=>$request->password
])){
$user= User::where('email',$request->email)->first();

if($user->role=='receptionist'){    
return redirect()->route('indexrecep');
}
elseif($user->role=='manager'){
return redirect()->route('ResptionistController.index');
}
return redirect()->route('home');
}
return redirect()->back();
    }
}
