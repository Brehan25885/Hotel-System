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
use App\Http\Resources\ManagerResource; //layer elli bst5dmo




class adminController extends Controller
{

    public function index(){
        $managers=Manager::all();
        return ManagerResource::collection($managers); //colection bta5od 7aga no3ha array htro7 postres htnfz el fun to array
    }

    //
   /*   public function storeManager(storeManagerRequest $request ,$name){
        Manager::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'national_id' => $request->get('national_id'),


        ]); 
        $manager=Manager::find($name);
          $manager = Manager::first();
        $token = JWTAuth::fromUser($manager); 
        
       return Response::json(compact('token'));  

    }  */
    
}
