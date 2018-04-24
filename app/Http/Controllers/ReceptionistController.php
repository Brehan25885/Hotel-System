<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Receptionist;
use App\Client;
use Yajra\Datatables\Datatables;
use Auth;
class ReceptionistController extends Controller
{
    public function index()
    {
        return view('recep.ajaxdisplayRecep');
      
  }

 function getdata(){
 
/*              return Datatables::of(Client::query())->make(true);
 */           
$clients=Client::query();
             return Datatables::of($clients)->addColumn('action', function ($client) {
                  return '<form method="GET" action="/recep/'.$client->id.'/approve" >
                  <button class="btn btn-primary" id="approve" > Approve </button>
              </form>';
          /*   return  '<button class="edit-modal btn btn-info"id="approve" data-id="{{$client->id}}"
  							data-name="{{$client->name}}">
  							<span class="glyphicon glyphicon-edit"></span> Approve
</button>';*/
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

       /*  $posts = Post::all();
        $post = $posts->first();
        return view('posts.index',[
            'posts' => $posts
        ]); */
}
}
