<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
//use Rinvex\Country\Models\Country;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('clients.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $allCountries = countries();
        //foreach($allCountries as $country){
           //$country['calling_code'];
            //print_r(array_keys($country));
        //}
        
        return view('clients.create',['countries'=>$allCountries]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,
        [
            'avatar_image'=>'image|nullable|max:1999'
        ]
    );

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
        $data=[
            'email' => $request->email,
            'name' => $request->name,
            'password' => $request->password,
            'country_code' => $request->country_code,
            'gender' => $request->gender,
            'avatar_image' => $fileNameToStore,
        ];
        $newClient=new Client($data);
        $newClient->save();
        $id=$newClient->id;

        return redirect()->route('clients.show', ['id' => $id]);
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
        $client=Client::find($id);
        $cc=$client->country_code;
        $allCountries=countries();
        foreach($allCountries as $country){
            if($country['calling_code']==$cc){
                $countryName=$country['name'];
            }   
        }
        
        return view('clients.show',['client'=>$client ,'countryName'=>$countryName]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $client=Client::find($id);
        $allCountries = countries();
        return view('clients.edit',['client'=>$client,'countries'=>$allCountries]);
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
        //
         //
         $this->validate($request,
         [
             'avatar_image'=>'image|nullable|max:1999'
         ]
     );
 
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
      }
         $data=[
             'email' => $request->email,
             'name' => $request->name,
             'country_code' => $request->country_code,
             'gender' => $request->gender
              
         ];
         $newClient=Client::find($id);
         if($request->hasfile('avatar_image')){
           $newClient->avatar_image=$fileNameToStore;
         }
         $newClient->update($data);
        
 
         return redirect()->route('clients.show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
