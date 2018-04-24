<?php

namespace App\Http\Controllers;
use App\Admin;
use App\Receptionist;
use App\Manager;
use App\Client;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function indexManager()
    {
      return view('admins.indexManager');
    }
    public function getDataManager(){
       $admins= Manager::query();
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
 
$admin= Receptionist::query();
    return Datatables::of($admin)->addColumn('action', function ($ad) {
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
   
$admin= Client::query();
 return Datatables::of($admin) ->addColumn('action', function ($cd) {
        return '<form method="GET" action="/admins/'.$cd->id.'/editc" >
        <button  class="btn btn-primary" > Edit </button>
    </form>
    <td><a class="btn btn-danger" href = "/admins/'.$cd->id.'/deletec">Delete</a></td>
    '
    ; })->make(true);

}






public function editRece ($id)
{
 $receptionists=Receptionist::find($id);
return view('admins.editReceptionist',[
    'receptionists' => $receptionists
]); 

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
 $managers=Manager::find($id);
return view('admins.editManager',[
    'managers' => $managers
]); 
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
 $clients=Client::find($id);
return view('admins.editClient',[
    'clients' => $clients
]); 
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
            return view('admins.createRece',[
                'admins' => $admins
            ]); 
            
        }
       
     public function storeRece(Request $request)
        {
            
             
            Receptionist::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'country' => $request->country,
                'gender' => $request->gender,
                'admin_id' => $request->admin_id
            ]);
            
           return redirect(route('datatable')); 
        }


        public function createManager()
        {
        $admins = Admin::all();
            return view('admins.createManager',[
                'admins' => $admins
            ]); 
            
        }
       
     public function storeManager(Request $request)
        {
            
             
            Manager::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'national_id' => $request->national_id,
               'admin_id' => $request->admin_id
            ]);
            
           return redirect(route('tables')); 
        }


        public function createClient()
        {
        $admins = Admin::all();
            return view('admins.createClient',[
                'admins' => $admins
            ]); 
            
        }
       
     public function storeClient(Request $request)
        {
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
             }else{
                 $fileNameToStore=".ninja.jpeg jpeg ninja";
                 
             }


            
             
            Client::create([
                'name' => $request->name,
                'email' => $request->email,
              'country' => $request->country,
              'mobile' => $request->mobile,
                'gender' => $request->gender,
                'avatar_image' => $fileNameToStore,

               'admin_id' => $request->admin_id,
            ]);
            
           return redirect(route('datatables')); 
        }
        public function destroyClient($id) {
          //  DB::delete('delete from clien where id = ?',[$id]);
            DB::table('clients')->where('id', '=', $id)->delete();
            return redirect(route('datatables')); 

         }


      

}
