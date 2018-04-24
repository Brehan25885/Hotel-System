
@extends('layouts.clientTemp')
@section('mainPage')
 </br>
 </br>
 <div class="col-md-1"></div>
 <div class="col-md-10">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Available Rooms </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="av_rooms" class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Capacity</th>
                  <th>Price</th>
                  <th style="width: 40px">Action</th>
                </tr>
                <tbody>
                @foreach($rooms as $room)
                <tr>
                   <td>{{$room->num}}</td>
                   <td>{{$room->capacity}}</td>
                   <td>{{$room->price}}</td>
                   <td><button class="edit-modal btn btn-info">
            <span class="glyphicon glyphicon-edit"></span> Make Reservation
        </button></td>
                </tr>
                @endforeach
                </tbody>
                </table>
          <!-- /.box -->
          @stop
          @push('scripts')

       <script type="text/javascript">
          $(document).ready(function(){
            $('#av_rooms').DataTable();
          });
       </script> 
        @endpush
   </div>
   </div>

