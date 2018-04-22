<?php

namespace App\Http\Controllers;
use App\Admin;
use App\Receptionist;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function indexManager()
    {
       /*  $admins = Admin::all(); */
        

        return view('admins.indexManager');
    }
    public function getDataManager(){
        $admins = Admin::join('managers', 'admins.manager_id', '=', 'managers.id')
            ->select(['managers.id','managers.name', 'managers.email', 'managers.password'])->orderBy('admins.id')->get();

         //   return Datatables::of($admins)->make(true);

         return Datatables::of($admins)
        
         ->make(true);
       /*  return Datatables::of(Admin::query())->make(true); */
}
public function indexRece()
{
   /*  $admins = Admin::all(); */
    

    return view('admins.indexReceptionists');
}
public function getDataRece(){
    $admin = Admin::join('receptionists', 'admins.receptionist_id', '=', 'receptionists.id')
        ->select(['receptionists.id','receptionists.name', 'receptionists.email'])->orderBy('admins.id')->get();

     //   return Datatables::of($admins)->make(true);

     return Datatables::of($admin) ->addColumn('action', function ($ad) {
        return '<form method="GET" action="/admins/'.$ad->id.'/edit" >
        <button  class="btn btn-primary" > Edit </button>
    </form>';
    })
     ->make(true);
   /*  return Datatables::of(Admin::query())->make(true); */
}







public function indexClient()
{
   /*  $admins = Admin::all(); */
    

    return view('admins.indexClient');
}
public function getDataClient(){
    $admin = Admin::join('clients', 'admins.client_id', '=', 'clients.id')
        ->select(['clients.id','clients.name', 'clients.email', 'clients.mobile'])->orderBy('admins.id')->get();

     //   return Datatables::of($admins)->make(true);

     return Datatables::of($admin)
    
     ->make(true);
   /*  return Datatables::of(Admin::query())->make(true); */
}
public function edit ($id)
{
 $admins=Admin::find($id);
 $receptionists=Receptionist::all();
 return view('admins.editReceptionist',compact('admins','receptionists'));
}

public function update(Request $request,$id){
    $admin=Receptionist::find($id);
    /* $admin->update([
        //'receptionist_id' => $request->receptionist_id
        'name' => $request->name
    ]); */
    $admin->name=$request->name;
    $admin->save();
    // $post->title=$request->title;
    // $post->desc=$request->desc;
    // $post->user_id=$request->user_id;
    // $post->save();
   

    /* return redirect(route('admins.indexReceptionists' ));   */
    return view('admins.indexReceptionists');


}




  

        
    //
}
