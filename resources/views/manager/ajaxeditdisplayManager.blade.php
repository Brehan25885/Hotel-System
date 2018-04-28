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
              <h3 class="box-title">edit receptionist</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{ route('ResptionistController.update',$receptionist->id) }}" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PUT')}}
              <div class="box-body">
              <div class="form-group">
                  <label for="exampleInputname">Name</label>
                  <input type="text" class="form-control" name="name" value="{{$receptionist->name}}" placeholder="Enter name">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" name="email" value="{{$receptionist->email}}" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="exampleInputnationalid">national_id</label>
                  <input type="text" class="form-control" name="national_id" value="{{$receptionist->national_id}}" placeholder="Enter nationalId">
                </div>
                <div class="form-group">
       <div class="pull-left image">
      <img src="/storage/avatar_images/{{$receptionist->avatar_image}}" class="img-circle" alt="User Image" width="60" height="80" >
      </div>

<label for="image">Update image</label>
<input name="avatar_image" type="file" id="image" class="form-control">
</div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" name="password" value="{{$receptionist->password}}"    placeholder="Password">
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Check me out
                  </label>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">edit</button>
              </div>
            </form>
          </div>
          </div>
          </div>
        </section>
        @endsection