<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Receptionist;
use App\Client;
use Auth;
class ReceptionistController extends Controller
{
    //
    public function approve($clientid)
    {
        $client=Client::find($clientid);
        $id = Auth::user()->id;
        $client->recep_id=$id;
        if ($client->is_approved==1){
            $client->is_approved=0;
            $client->recep_id=NULL;
            $client->save();
        }
        else{
            $client->recep_id=$id;
            $client->is_approved=1;
        $client->save();}
        return redirect(route('datatables'));

       /*  $posts = Post::all();
        $post = $posts->first();
        return view('posts.index',[
            'posts' => $posts
        ]); */
}
}
