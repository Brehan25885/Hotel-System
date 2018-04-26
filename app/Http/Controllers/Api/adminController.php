<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Manager;
use JWTFactory;
use JWTAuth;
use Validator;
use Response;
use App\Http\Requests\storeManagerRequest;



class adminController extends Controller
{
    //
    public function storeManager(storeManagerRequest $request){
        Manager::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'national_id' => $request->get('national_id'),


        ]);
        $manager = Manager::first();
        $token = JWTAuth::fromUser($manager);
        
        return Response::json(compact('token'));
    }
    
}
