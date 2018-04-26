<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\rooms;
use App\clients;

class GetroomsController extends Controller
{
    //
    public function index(){
        $room=Room::select('num','capacity','price');    
        return DataTables::of($rooms)->make(true);

    }
}
