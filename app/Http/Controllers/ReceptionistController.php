<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Receptionist;
use App\Client;
use Yajra\Datatables\Datatables;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;

class ReceptionistController extends Controller
{
    /* public function __construct()
{
    $this->middleware(['role:receptionist']);
} */
    public function index()
    {
        return view('recep.index');
      
  }

 function getdata(){
 
/*              return Datatables::of(Client::query())->make(true);*/       
$clients = Client::query() ->select([ 'id','name','email','mobile', 'country', 'gender'])
->where('is_approved','=','0'); 
             return Datatables::of($clients)->addColumn('action', function ($client) {
                  return '<form method="GET" action="/recep/'.$client->id.'/approve" >
                  <button class="btn btn-primary" id="approve" > Approve </button>
              </form>';
         
              })   ->make(true);  
              
 }
 public function indexReserve()
 {
     return view('recep.ajaxdisplayReservations');
   
}
function getReservations(){
 
              
               $id = Auth::user()->id;
               $union = Client::query() ->select(['id', 'name', 'client_accompany_no', 'room_number', 'paid_price'])
               ->where('recep_id','=',$id); 
    
              
                   return Datatables::of($union)->make(true);            
       }
    //
    public function approve($clientid)
    {
        $client=Client::find($clientid);
        $id = Auth::user()->id;
        $client->recep_id=$id;
        if ($client->is_approved==1){
            $client->is_approved=0;
            $client->recep_id=NULL;
            $client->save();
        }
        else{
            $client->recep_id=$id;
            $client->is_approved=1;
        $client->save();}
        return redirect(route('datatables'));

    
}

 public function assignRoles()
{   
   User::create([
        'name' => 'brehan',
            'email' => 'brehan.ibrahim@gmail.com',
            'password' => Hash::make('123456'),
    ])->assignRole('client');

  //  $user=User::find(8)->hasRole('admin');

    return redirect(route('datatables'));

   
} 


}
