@extends('layouts.dashManager')
@section('content')
@if($errors->any())
<div class="alert alert-danger">
<ul>
@foreach($errors->all() as $error)
<li>{{$error}}</li>
</ul>
@endforeach
</div>
@endif
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">create new receptionist</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{route('ResptionistController.sto')}}" enctype="multipart/form-data">
            {{csrf_field()}}
              <div class="box-body">
              <div class="form-group">
                  <label for="exampleInputname">Name</label>
                  <input type="text" class="form-control" name="name"  placeholder="Enter name">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" name="email"  placeholder="Enter email"  value="{{old('email')}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputnationalid">national_id</label>
                  <input type="text" class="form-control" name="national_id"  placeholder="Enter nationalId"  value="{{old('national_id')}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputImage">Image</label>
                  <input type="file" class="form-control" name="avatar_image" id="image" value="{{old('avatar_image')}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Password" value="{{old('password')}}">
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Check me out
                  </label>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          </div>
          </div>
        </section>
        @endsection