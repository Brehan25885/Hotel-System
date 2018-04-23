@extends('layouts.app')
@section('content')
    </br>
    </br>
    <div class="container">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Register</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="/clients" enctype="multipart/form-data">
            {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input  name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="name">Name</label>
                  <input name="name" type="text" class="form-control" id="name" placeholder="Enter your name">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                  <label>Gender</label>
                  <select name="gender" class="form-control">
                    <option value="0">Male</option>
                    <option value="1">Female</option>
                    
                  </select>
                </div>
                <div class="form-group">
                  <label>Country</label>
                  <select name="country_code" class="form-control">
                    <option value="1">Egypt</option>
                    <option value="2">Italy</option>
                    <option value="3">Spain</option>
                   
                  </select>
                </div>
                <div class="form-group">
                  <label for="image">Upload image</label>
                  <input name="avatar_image" type="file" id="image">

                  <p class="help-block">Choose your profile image less than 2MB in size.</p>
                </div>
               
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Register</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
</div>


@endsection