<?php

namespace App\Http\Controllers;
use App\Admin;
use App\Receptionist;
use App\Manager;
use App\Client;
use App\User;
use App\Room;
use Auth;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\storeManagerRequest;
use App\Http\Requests\updateManagerRequest;
use App\Http\Requests\updateClientRequest;

use App\Http\Requests\storeClientRequest;

use App\Http\Requests\updateReceRequest;

use App\Http\Requests\storeReceRequest;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function indexManager()
    {
      return view('admins.indexManager');
    }
    public function AdminProfile()
    {
         $user=Auth::user()->id;
        //dd($user);
     // return view('admins.adminProfile'); 
      $users=User::find($user);
     //dd($users);
     return view('admins.adminProfile' , compact('users'));



    }


    public function updateAdmin(Request $request,$id){
        $users=User::find($id);
        $users->email=$request->email;
        $users->name=$request->name;
        $users->save();
        return redirect(route('tables'));

    }


    public function getDataManager(){
       $admins= Manager::query();
       return Datatables::of($admins) ->addColumn('action', function ($ud) {
            return '<form method="GET" action="/admins/'.$ud->id.'/editm" >
            <button  class="btn btn-primary" > Edit </button>
        </form>
        <a href="#" class="btn btn-xs btn-danger delete" id="'.$ud->id.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>
        ';
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
    </form>
    <a href="#" class="btn btn-xs btn-danger delete" id="'.$ad->id.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>    
    ';
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
    <a href="#" class="btn btn-xs btn-danger delete" id="'.$cd->id.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>
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

public function updateRece(updateReceRequest $request,$id){

  
    $Receptionists=Receptionist::find($id);
    $email=$Receptionists->email;
    $user=User::where('email','=',$email)->first();


    if($request->hasfile('avatar_image')){


         $fileNameWithExt=$request->file('avatar_image')->getClientOriginalName();
        
         //get file name only and turn it into string
          $fileName=implode(" ",pathinfo($fileNameWithExt));

         
        //get file ext only
          $extension=$request->file('avatar_image')->getClientOriginalExtension();

        //new file name
          $fileNameToStore=$fileName."_".time().".".$extension;
         
          //upload image
          $path=$request->file('avatar_image')->storeAs('public/avatar_images',$fileNameToStore);
//dd($path);
     }
    $Receptionists->name=$request->name;
    $Receptionists->email=$request->email;
    $Receptionists->password=Hash::make($request->password);
    $Receptionists->national_id=$request->national_id;
    if($request->hasfile('avatar_image')){  

 $Receptionists->avatar_image= $fileNameToStore;
    }
   // 'avatar_image' => $fileNameToStore,
    $Receptionists->save();

    $user->email=$request->email;
     $user->name=$request->name;
$user->save();

   return view('admins.indexReceptionists');
}



public function editManager ($id)
{
 $managers=Manager::find($id);
return view('admins.editManager',[
    'managers' => $managers
]); 
}

public function updateManager(updateManagerRequest $request,$id){


    $Managers=Manager::find($id);
    $email= $Managers->email;
    $user=User::where('email','=',$email)->first();
    if($request->hasfile('avatar_image')){

/*         unlink(public_path() . '/storage/avatar_images/'.$Receptionists->avatar_image);
 */        //get file name with ext

         $fileNameWithExt=$request->file('avatar_image')->getClientOriginalName();
        
         //get file name only and turn it into string
          $fileName=implode(" ",pathinfo($fileNameWithExt));

         
        //get file ext only
          $extension=$request->file('avatar_image')->getClientOriginalExtension();

        //new file name
          $fileNameToStore=$fileName."_".time().".".$extension;
         
          //upload image
          $path=$request->file('avatar_image')->storeAs('public/avatar_images',$fileNameToStore);
//dd($path);
     }


     if($request->hasfile('avatar_image')){  

        $Managers->avatar_image= $fileNameToStore;
           }






   
    $Managers->name=$request->name;
    $Managers->email=$request->email;
    $Managers->national_id=$request->national_id;
    $Managers->save();

   
    $user->email=$request->email;
     $user->name=$request->name;
    $user->save();
return view('admins.indexManager');


}


public function editClient ($id)
{
 $clients=Client::find($id);
return view('admins.editClient',[
    'clients' => $clients
]); 
}

public function updateClient(updateClientRequest $request,$id){
    $clients=Client::find($id);
$email=$clients->email;
$user=User::where('email','=',$email)->first();


    if($request->hasfile('avatar_image')){

        /*         unlink(public_path() . '/storage/avatar_images/'.$Receptionists->avatar_image);
         */        //get file name with ext
        
                 $fileNameWithExt=$request->file('avatar_image')->getClientOriginalName();
                
                 //get file name only and turn it into string
                  $fileName=implode(" ",pathinfo($fileNameWithExt));
        
                 
                //get file ext only
                  $extension=$request->file('avatar_image')->getClientOriginalExtension();
        
                //new file name
                  $fileNameToStore=$fileName."_".time().".".$extension;
                 
                  //upload image
                  $path=$request->file('avatar_image')->storeAs('public/avatar_images',$fileNameToStore);
        //dd($path);
             }
        
        
             if($request->hasfile('avatar_image')){  
        
                $clients->avatar_image= $fileNameToStore;
                   }
        

    $clients->name=$request->name;
   $clients->email=$request->email;
   $clients->mobile=$request->mobile;
   $clients->country=$request->country;
   $clients->gender=$request->gender;
   $clients->save();
  
   $user->email=$request->email;
    $user->name=$request->name;
   $user->save();
return view('admins.indexClient');


}
public function createRece()
        {
        $admins = Admin::all();
            return view('admins.createRece',[
                'admins' => $admins
            ]); 
            
        }
       
     public function storeRece(storeReceRequest $request)
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
                 $fileNameToStore="avatar.jpg";
                 
             }
            
             
            Receptionist::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'national_id' => $request->national_id,
               
                'admin_id' => $request->admin_id,
                'avatar_image' => $fileNameToStore,
            ]);
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                
            ])->assignRole('receptionist');
            
           return redirect(route('datatable')); 
        }


        public function createManager()
        {
        $admins = Admin::all();
            return view('admins.createManager',[
                'admins' => $admins
            ]); 
            
        }
       
     public function storeManager(storeManagerRequest $request)
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
                 $fileNameToStore="avatar.jpg";
                 
             }

            
             
            Manager::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'national_id' => $request->national_id,
               'admin_id' => $request->admin_id,
               'avatar_image' => $fileNameToStore,

            ]);
             
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),

            ])->assignRole('manager');
            
           return redirect(route('tables')); 
        }


        public function createClient()
        {
            $countries = countries();
        $admins = Admin::all();
        $rooms=Room::all();
            return view('admins.createClient',[
                'admins' => $admins,
                'countries'=>$countries,
                'rooms'=> $rooms


            ]); 
            
        }
       
     public function storeClient(storeClientRequest $request)
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
                 $fileNameToStore="avatar.jpg";
                 
             }


            
             
            Client::create([
                'name' => $request->name,
                'email' => $request->email,
              'country' => $request->country,
              'mobile' => $request->mobile,
              'password' => Hash::make($request->password),
              'room_number' => $request->room,

                'gender' => $request->gender,
                'admin_id' => $request->admin_id,
                'avatar_image' => $fileNameToStore,
              
            ]);
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
              
            ])->assignRole('client');;
            
           return redirect(route('datatables')); 
        }
        public function destroyClient($id) {
            DB::table('clients')->where('id', '=', $id)->delete();
            return redirect(route('datatables')); 

         }
         public function destroyManager($id) {
              DB::table('managers')->where('id', '=', $id)->delete();
              return redirect(route('tables')); 
  
           }
           public function destroyRece($id) {
            DB::table('receptionists')->where('id', '=', $id)->delete();
            return redirect(route('datatable')); 

         }
  

         function removedataManager(Request $request)
         {
             $manager = Manager::find($request->input('id'));
             if($manager->delete())
             {
                 echo 'Data Deleted';
             }
         }
         function removedataClient(Request $request)
         {
             $client = Client::find($request->input('id'));
             if($client->delete())
             {
                 echo 'Data Deleted';
             }
         }

         function removedataRece(Request $request)
         {
             $rece = Receptionist::find($request->input('id'));
             if($rece->delete())
             {
                 echo 'Data Deleted';
             }
         }
      

}
