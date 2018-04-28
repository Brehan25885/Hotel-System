<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\User;
use App\Room;
class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return ('hello client');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $client=Client::find($id);
        
        
        return view('clients.show',['client'=>$client]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $client=Client::find($id);
        $allCountries = countries();
        return view('clients.edit',['client'=>$client,'countries'=>$allCountries]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //get current email
        $editClient=Client::find($id);
        $email=$editClient->email;
        
        //update user table
         $editUser=User::where('email',$email)->get();
         
        $userData=[
            'email' => $request->email,
            'name' => $request->name, 
        ];
        $editUser[0]->update($userData);

        //update client table
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
         }
            $data=[
                'email' => $request->email,
                'name' => $request->name,
                'mobile'=>$request->mobile,
                'country_code' => $request->country_code,
                'gender' => $request->gender
                 
            ];
            
            if($request->hasfile('avatar_image')){
              $editClient->avatar_image=$fileNameToStore;
            }
            $editClient->update($data);
           
    
            return redirect()->route('clients.show', ['id' => $id]);

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function createRes($roomId , $clientId){
        $room=Room::find($roomId);
        $client=Client::find($clientId);
        
        return view ('reservations.createRes',['client'=>$client,'room'=>$room]);
    }

    public function storeRes(Request $request){
        //
        // Set your secret key: remember to change this to your live secret key in production
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey("sk_test_mXLOIO7kwjYPpg80ckqs8VSF");

        // Token is created using Checkout or Elements!
         // Get the payment token ID submitted by the form:
        $token = $request->stripeToken;
        
        $charge = \Stripe\Charge::create([
          'amount' => $request->roomPrice,
          'currency' => 'usd',
          'description' => 'Example charge',
          'source' => $token,
         ]);

         //save to DB
         $client=Client::find($request->clientId);

         $room=Room::find($request->roomId);
         $data=[
            
            'room_number' => $room->number,
            'price_paid' => $request->roomPrice,
            
        ];
        
        $client->update($data);

        //update room to reserved
         $room=Room::find($request->roomId);
        
         $room->is_reserved=1;
         $room->save();
         dd('reserved successfully');
        return redirect()->route('reservations.showRes',['id'=>$request->clientId]);

    }
}
