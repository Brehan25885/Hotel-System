<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Client;
use App\Room;
use App\Reservation;

class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( $roomId , $clientId)
    {
        //
        
        $room=Room::find($roomId);
        $client=Client::find($clientId);
        
        return view ('reservations.createRes',['client'=>$client,'room'=>$room]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
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

         $data=[
            'client_id' => $request->clientId,
            'room_id' => $request->roomId,
            'price_paid' => $request->roomPrice,
            
        ];
        $newRes=new Reservation($data);
        $newRes->save();

        //update room to reserved
         $room=Room::find($request->roomId);
        
         $room->available=0;
         $room->save();

        return redirect()->route('reservations.showRes',['id'=>$request->clientId]);
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
        $reservations=Reservation::where('client_id',$id)->get();
        $data=array();
         foreach($reservations as $res){
            $room=Room::where('id',$res->room_id)->get();
            $price=$res->price_paid/100;

            //my array with wanted data
            $newroom['capacity']=$room[0]->capacity;
            $newroom['price']=$price;
            $newroom['roomNum']=$room[0]->num;
                

             //push to array
             $data[]=$newroom;
         }
        
        return view('reservations.showRes',['client'=>$client ,'rooms'=>$data]);
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
        //
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
}
