@extends('layouts.clientTemp')
@section('mainPage')

</br>
 </br>
 <div class="col-md-1"></div>
 <div class="col-md-10">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">My Reservations </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" >
              <table  class="table table-bordered">
                <tr>
                  <th style="width: 10px">Room #</th>
                  <th>Capacity</th>
                  <th>Price Paid</th>
                  
                </tr>
                <tbody>
                @foreach($rooms as $room)
                <tr>
                   <td>{{$room['roomNum']}}</td>
                   <td>{{$room['capacity']}}</td>
                   <td>{{$room['price']}}</td>
                   
                </tr>
                @endforeach
                </tbody>
                 
                </table>
               
          <!-- /.box -->
          </div>
   </div>

</div>
@endsection