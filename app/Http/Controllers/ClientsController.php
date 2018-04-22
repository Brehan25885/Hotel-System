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
 
             return Datatables::of(Client::query())->make(true);
 }
}
