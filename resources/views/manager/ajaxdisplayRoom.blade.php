@extends('layouts.dashManager')
@section('content')
  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('RoomController.create') }}">Create new room</a>
                </div>
              <h3 class="box-title">Manage Rooms</h3>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <table  class="table table-bordered" id="rooms-table"  style="width:100%">
                <thead>
                <tr>
                  <th>number</th>
                  <th>capacity</th>
                  <th>price</th>
                  <th>floorName</th>
                  <th></th>
                </tr>
                </thead>
               
                </table>
                </div>
                </div>
                </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
</div>
@stop
@push('scripts')
<script>
$(function() {
  var table =  $('#rooms-table').DataTable({
        processing: true,
        serverSide: true,
        ajax:{
          url:'{!! route('RoomController.getdata') !!}',
          },
        columns: [
            { data: 'number', name: 'number' },
            { data: 'capacity', name: 'capacity' },
            { data: 'price', name: 'price' },
            { data: 'floor.name', name: 'floor.name' },
            {data: 'action', name: 'action', orderable: false, searchable: false},
          
        ]
    });
    $(document).on('click', '.delete', function(){
        var id = $(this).attr('id');
        if(confirm("Are you sure you want to Delete this data?"))
        {
            $.ajax({
                url:"{{route('RoomController.delete')}}",
                mehtod:"get",
                data:{id:id},
                success:function(data)
                {
                    //alert(data);
                    $('#rooms-table').DataTable().ajax.reload();
                }
            })
        }
        else
        {
            return false;
        }
    }); 
  
});
</script>
@endpush