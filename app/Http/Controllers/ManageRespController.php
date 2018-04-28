<?php

namespace App\Http\Controllers;
use App\Receptionist;
use App\User;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRespRequest;
use League\Flysystem\Filesystem;
use Cog\Contracts\Ban\Bannable as BannableContract;
use Cog\Laravel\Ban\Traits\Bannable;
use Auth;

class ManageRespController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        <td><a href="#" class="btn btn-primary ban"  id="'. $ud->id .'" >Ban</a></td>
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
    public function update(StoreRespRequest $request, $id)
    {
        $userid=Auth::user()->id;
        $Receptionists=Receptionist::find($id);
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
    
    $Receptionists->name=$request->name;
    $Receptionists->email=$request->email;
    $Receptionists->password=$request->password;
    $Receptionists->national_id=$request->national_id;
    $Receptionists->manager_id=$userid;
    if($request->hasfile('avatar_image')){  
 $Receptionists->avatar_image= $fileNameToStore;
    }
   // 'avatar_image' => $fileNameToStore,
    $Receptionists->save();
    return redirect(route('ResptionistController.index'));

        /*if($request->hasfile('avatar_image')){
            /*         unlink(public_path() . '/storage/avatar_images/'.$Receptionists->avatar_image);
             */        //get file name with ext
                   /*  $fileNameWithExt=$request->file('avatar_image')->getClientOriginalName();
                    
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

        Receptionist::where('id',$id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'national_id'=>$request->national_id,
            'password'=>$request->password,
            'manager_id'=>$userid,
            
        ]);
        return redirect(route('ResptionistController.index'));
    }*/
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
    public function banReceptionist(Request $request){
        //update post data
        $receptionist=Receptionist::find($request->input('id'));
        $email=$receptionist->email;
        $user=User::where('email',$email)->first();
           if($user->isBanned()){
            $user->unban();
            return redirect()->route('ResptionistController.index');
           } 
        elseif($user->isNotBanned()){
            $user->ban();
            return redirect()->route('ResptionistController.index');
        }   
        
    }
}
