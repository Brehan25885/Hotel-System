@extends('layouts.clientTemp')
@section('mainPage')

 <!-- Content Header (Page header) 
 <section class="content-header">
      <h1>
        Hello {{$client->name}}
        <small>Your profile Info</small>
      </h1> -->
      </br>
      </br>
      <div class="col-md-3">
      </div>
      <div class="col-md-6">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="/storage/avatar_images/{{$client->avatar_image}}" alt="User profile picture">

              <h3 class="profile-username text-center">{{$client->name}}</h3>

              <p class="text-muted text-center">{{$client->email}}</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Gender</b> 
                  <a class="pull-right">{{$client->gender}}</a>
                 
                </li>
                <li class="list-group-item">
                  <b>Country</b> <a class="pull-right">{{$client->country}}</a>
                </li>
                <li class="list-group-item">
                  <b>Mobile</b> 
                 
                  <a class="pull-right">{{$client->mobile}}</a>
                 
                </li>
                
              </ul>

            
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      
    </section>


@endsection