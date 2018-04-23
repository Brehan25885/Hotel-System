<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use Yajra\Datatables\Datatables;
class ClientsController extends Controller
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
                  <button  class="btn btn-primary" > Approve </button>
              </form>';
              })   ->make(true); 
              
 }
}
