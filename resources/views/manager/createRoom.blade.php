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
              <h3 class="box-title">create new floor</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{route('RoomController.store')}}">
            {{csrf_field()}}
              <div class="box-body">
              <div class="form-group">
                  <label for="exampleInputname">RoomNumber</label>
                  <input type="text" class="form-control" name="number"  placeholder="Enter Room number" value="{{old('number')}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputname">Capacity</label>
                  <input type="text" class="form-control" name="capacity"  placeholder="Enter Room capacity" value="{{old('capacity')}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputname">price</label>
                  <input type="text" class="form-control" name="price"  placeholder="Enter Room price" value="{{old('price')}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputname">enter floor name</label>
                  <select class="form-control" name="floor_id">
                   @foreach ($floors as $floor)
                        <option value="{{$floor->id}}">{{$floor->name}}</option>
                    @endforeach
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