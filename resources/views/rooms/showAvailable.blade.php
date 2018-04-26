
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
            <div class="box-body" id="someDiv">
              <table  class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Capacity</th>
                  <th>Price</th>
                  <th style="width: 40px">Action</th>
                </tr>
                <tbody>
                @foreach($rooms as $room)
                {{$dollars=$room->price/100}}
                <tr>
                   <td>{{$room->num}}</td>
                   <td>{{$room->capacity}}</td>
                   <td>{{$dollars}}</td>
                   <td><a href="/reservations/rooms/{{$room->id}}/{{$client->id}}" class="edit-modal btn btn-info">
                   <span class="glyphicon glyphicon-edit"></span> Make Reservation
                   </a></td>
                </tr>
                @endforeach
                </tbody>
                 
                </table>
               
          <!-- /.box -->
          </div>
   </div>

         

       <script type="text/javascript">
        $('document').ready(function(){
            

          //$("#btn").click(function(){
             // alert("hi");
          //});
          
    $('#someDiv table'). DataTables({      
              'proccessing':true,
               'serverSide':true,
               'ajax':'{!!route('getrooms.index')!!}',
               'columns':[
                 {data:"num",name:'#'},
                 {data:"capacity",name:'capacity'},
                 {data:"price",name:'price'}
               ]
    }); 
          
          });
          
       </script> 
        @endsection
   
