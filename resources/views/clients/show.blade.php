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
                  @if($client->gender==1)
                  <a class="pull-right">Female</a>
                  @else
                  <a class="pull-right">Male</a>
                   @endif
                </li>
                <li class="list-group-item">
                  <b>Country</b> <a class="pull-right">{{$countryName}}</a>
                </li>
                <li class="list-group-item">
                  <b>Approved</b> 
                  @if($client->approved==1)
                  <a class="pull-right">Approved</a>
                  @else
                  <a class="pull-right">Pending</a>
                   @endif
                </li>
                
              </ul>

            
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      
    </section>


@endsection