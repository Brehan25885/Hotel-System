<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use Yajra\Datatables\Datatables;
use Auth;
class ClientsController extends Controller
{
    public function index()
    {
        return view('manager.ajaxdisplayManager');
    }
    public function getdata(){
        //return Datatables::of(Receptionist::query())->make(true);
    
        // $resptionists=Resptionist::select(['name','email','created_at']);
        //$resptionists=Resptionist::all();
         //dd($resptionists);
         
         //return Datatables::of($resptionists)->make(true)
         $receptionists= Receptionist::query();
       return Datatables::of($receptionists) ->addColumn('action', function ($ud) {
            return '<form method="GET" action="/manageresp/'.$ud->id.'/edit" >
            <button  class="btn btn-primary" > Edit </button>
        </form>
        <td><a href="#" class="btn btn-danger delete"  id="'. $ud->id .'" ><i class="glyphicon glyphicon-remove"></i>Delete</a></td>
        ';
        })
         ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manager.createReceptionist');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRespRequest $request)
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


        $userid=Auth::user()->id;
        Receptionist::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'national_id'=>$request->national_id,
            'password'=>$request->password,
            'manager_id'=>$userid,
            'avatar_image'=>$fileNameToStore,
          ]);
          //return view('manager.ajaxdisplayManager');

          return redirect(route('ResptionistController.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   /*$receptionist=Receptionist::find($id);
        return view('manager.ajaxeditdisplayManager',[
            'receptionist'=>$receptionist,
            ]); */  
      $receptionist=Receptionist::find($id);
        $userid=Auth::user()->id;
        if( $userid==$receptionist->manager_id){
        return view('manager.ajaxeditdisplayManager',[
            'receptionist'=>$receptionist,
        ]);
        }
        else{
         return '<script>alert("you have not permision to make action on this row")</script>';
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $userid=Auth::user()->id;
        Receptionist::where('id',$id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'national_id'=>$request->national_id,
            'password'=>$request->password,
            'manager_id'=>$userid,
            
        ]);
        return redirect(route('ResptionistController.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
    function removedata(Request $request)
    { 
        $receptionist = Receptionist::find($request->input('id'));
        $userid=Auth::user()->id;
        if( $userid==$receptionist->manager_id){
        
        $receptionist ->delete();
       }
        else{
           return '<script>alert("you have not permision to make action on this row")</script>';
           }
       /* if($receptionist ->delete())
        {
            echo 'Data Deleted';
        }*/
        //return redirect()->route('ResptionistController.index');
    }



}
