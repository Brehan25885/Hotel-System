<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {$countries = countries();
        return view('auth.register',[
          
            'countries' =>$countries
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        if($request->hasfile('avatar_image')){
            //get file name with ext
             $fileNameWithExt=$request->file('avatar_image')->getClientOriginalName();
            //get file name only and turn it into string
              $fileName=implode(" ",pathinfo($fileNameWithExt));
             
             
            //get file ext only
              $extension=$request->file('avatar_image')->getClientOriginalExtension();
              
            //new file name
              $fileNameToStore=$fileName."_".time().".".$extension;
             
              //upload image
              $path=$request->file('avatar_image')->storeAs('public/avatar_images',$fileNameToStore);
         }else{
             $fileNameToStore="avatar.jpg";
             
         }
         //dd($request->all());
        event(new Registered($user = $this->create($request->all(), $fileNameToStore)));

        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
}
