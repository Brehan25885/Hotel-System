<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreRoomRequest;
use Yajra\Datatables\Datatables;
use App\Floor;
use App\Room;
use Auth;

class ManageRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manager.ajaxdisplayRoom');
    }
    public function getdata(){
         $rooms=Room::with('floor')->get();
       return Datatables::of($rooms) ->addColumn('action', function ($ud) {
          $userid=Auth::user()->id;
           if( $userid == $ud->manager_id){
            return '<form method="GET" action="/managerRoom/'.$ud->id.'/edit" >
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
        $floors=Floor::all();
        return view('manager.createRoom',[
           'floors'=>$floors
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoomRequest $request)
    {
        $userid=Auth::user()->id;
        Room::create([
            'number'=>$request->number,
            'manager_id'=>$userid,
            'price'=>$request->price,
            'capacity'=>$request->capacity,
            'floor_id'=>$request->floor_id
          ]);
          return redirect(route('RoomController.index'));

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
        $floors=Floor::all();
        $room=Room::find($id);
        return view('manager.editRoom',[
            'floors'=>$floors,
            'room'=>$room
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRoomRequest $request, $id)
    {
        $userid=Auth::user()->id;
        Room::where('id',$id)->update([
            'number'=>$request->number,
            'manager_id'=>$userid,
            'price'=>$request->price,
            'capacity'=>$request->capacity,
            'floor_id'=>$request->floor_id
            
        ]);
        return redirect(route('RoomController.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    function removedata(Request $request)
    { 
        $room = Room::find($request->input('id'));
        $room->delete();
    }
}
