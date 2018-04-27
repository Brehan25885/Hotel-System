<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
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

if($user->hasRole('receptionist')){    
return redirect()->route('indexrecep');
}
else if ($user->hasRole('client')){    
    return redirect()->route('indexclient');
    }
    
return redirect()->route('home');
}
return redirect()->back();
    }
}
