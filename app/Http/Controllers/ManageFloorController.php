<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreFloorRequest;
use Yajra\Datatables\Datatables;
use App\Floor;
use Auth;

class ManageFloorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manager.ajaxdisplayFloor');
    }
    public function getdata(){
         $floors= Floor::query();
       return Datatables::of($floors) ->addColumn('action', function ($ud) {
          $userid=Auth::user()->id;
            if( $userid == $ud->manager_id){
            return '<form method="GET" action="/managerfloor/'.$ud->id.'/edit" >
            <button  class="btn btn-primary" > Edit </button>
        </form>
        <td><a href="#" class="btn btn-danger delete"  id="'. $ud->id .'" ><i class="glyphicon glyphicon-remove"></i>Delete</a></td>
        ';
            }
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
        return view('manager.createFloor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFloorRequest $request)
    {
    $userid=Auth::user()->id;
    $ids =Floor::pluck('id');
    $idds=(array)$ids;
    do {
        $id = rand(1000, 99999);
    } while (in_array($id, $idds));
    
// Generate a new unique number

         Floor::create([
            'id'=>$id ,
            'name'=>$request->name,
            'manager_id'=>$userid,
          ]);
          return redirect(route('FloorController.index'));
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
    {
        $floor=Floor::find($id);
        return view('manager.editFloor',[
            'floor'=>$floor,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreFloorRequest $request, $id)
    {
        $userid=Auth::user()->id;
        Floor::where('id',$id)->update([
            'name'=>$request->name,
            'manager_id'=>$userid,
            
        ]);
        return redirect(route('FloorController.index'));
        
    }
    function removedata(Request $request)
    { 
        $floor = Floor::find($request->input('id'));
        $floor->delete();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
}
