<?php

namespace App\Http\Controllers;
use App\Admin;
use App\Receptionist;
use App\Manager;
use App\Client;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function indexManager()
    {
      return view('admins.indexManager');
    }
    public function getDataManager(){
        $admins = Admin::join('managers', 'admins.manager_id', '=', 'managers.id')
            ->select(['managers.id','managers.name', 'managers.email', 'managers.password','managers.national_id'])->orderBy('admins.id')->get();
       return Datatables::of($admins) ->addColumn('action', function ($ud) {
            return '<form method="GET" action="/admins/'.$ud->id.'/editm" >
            <button  class="btn btn-primary" > Edit </button>
        </form>';
        })
         ->make(true);
       }
public function indexRece()
{
    return view('admins.indexReceptionists');
}
public function getDataRece(){
    $admin = Admin::join('receptionists', 'admins.receptionist_id', '=', 'receptionists.id')
        ->select(['receptionists.id','receptionists.name', 'receptionists.email','receptionists.country','receptionists.gender'])->orderBy('admins.id')->get();

    return Datatables::of($admin) ->addColumn('action', function ($ad) {
        return '<form method="GET" action="/admins/'.$ad->id.'/edit" >
        <button  class="btn btn-primary" > Edit </button>
    </form>';
    })
     ->make(true);
  }



public function indexClient()
{
    return view('admins.indexClient');
}
public function getDataClient(){
    $admin = Admin::join('clients', 'admins.client_id', '=', 'clients.id')
        ->select(['clients.id','clients.name', 'clients.email', 'clients.mobile','clients.country','clients.gender'])->orderBy('admins.id')->get();

 return Datatables::of($admin) ->addColumn('action', function ($cd) {
        return '<form method="GET" action="/admins/'.$cd->id.'/editc" >
        <button  class="btn btn-primary" > Edit </button>
    </form>';
    })
     ->make(true);
   
}
public function editRece ($id)
{
 $admins=Admin::find($id);
 $receptionists=Receptionist::all();
 return view('admins.editReceptionist',compact('admins','receptionists'));
}

public function updateRece(Request $request,$id){
    $Receptionists=Receptionist::find($id);
    $Receptionists->name=$request->name;
    $Receptionists->email=$request->email;
    $Receptionists->country=$request->country;
    $Receptionists->save();



   return view('admins.indexReceptionists');
}



public function editManager ($id)
{
 $admins=Admin::find($id);
 $managers=Manager::all();
 return view('admins.editManager',compact('admins','managers'));
}

public function updateManager(Request $request,$id){
    $Managers=Manager::find($id);
    $Managers->name=$request->name;
    $Managers->email=$request->email;
    $Managers->national_id=$request->national_id;
    $Managers->save();



  
return view('admins.indexManager');


}


public function editClient ($id)
{
 $admins=Admin::find($id);
 $clients=Client::all();
 return view('admins.editClient',compact('admins','clients'));
}

public function updateClient(Request $request,$id){
    $clients=Client::find($id);
    $clients->name=$request->name;
   $clients->email=$request->email;
   $clients->mobile=$request->mobile;
   $clients->country=$request->country;
   $clients->gender=$request->gender;
   $clients->save();
  
return view('admins.indexClient');


}



public function createRece()
        {
            $admins = Admin::all();
            return view('admins.createRece'); 
            
        }
       
     public function storeRece(Request $request)
        {
            
             
            Receptionist::create([
                'name' => $request->name,
                'password' => $request->password,
            ]);
            
           return redirect(route('admins.indexReceptionists')); 
        }
}
