<?php

namespace App\Http\Controllers;
use App\Admin;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
       /*  $admins = Admin::all(); */
        

        return view('admins.indexManager');
    }
    public function getData(){
        return Datatables::of(Admin::query())->make(true);

    }
        
    //
}
