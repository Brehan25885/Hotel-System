@extends('layouts.app')
@section('content')
    </br>
    </br>
    <div class="container">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Profile</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="/clients/{{$client->id}}" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PUT')}}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input  name="email" type="email" class="form-control" id="exampleInputEmail1" value="{{$client->email}}" >
                </div>
                <div class="form-group">
                  <label for="name">Name</label>
                  <input name="name" type="text" class="form-control" id="name" value="{{$client->name}}">
                </div>
                <div class="form-group">
                  <label>Gender</label>
                  <select name="gender" class="form-control" >
                    <option value="0" >Male</option>
                    @if($client->gender==1)
                    <option value="1" selected>Female</option>
                    @else
                    <option value="1">Female</option>
                    @endif
                  </select>
                </div>
                <div class="form-group">
                  <label>Country</label>
                  <select name="country_code" class="form-control">
                  @foreach ($countries as $country)
                    @if($country['calling_code']==$client->country_code)
                 <option value="{{$country['calling_code']}}" selected>{{$country['name']}}</option>
                    @else
                 <option value="{{$country['calling_code']}}">{{$country['name']}}</option>  
                    @endif
                  @endforeach   
                   
                  </select>
                </div>
                <div class="form-group">
                  
                  <div class="pull-left image">
                     <img src="/storage/avatar_images/{{$client->avatar_image}}" class="img-circle" alt="User Image" width="60" height="80" >
                  </div>
                  <label for="image">Update image</label>
                  <input name="avatar_image" type="file" id="image">

                  

                </div>
               
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Edit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
</div>


@endsection