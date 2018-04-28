@extends('layouts.dashManager')
@section('content')
  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('FloorController.create') }}">Create new floor</a>
                </div>
              <h3 class="box-title">Manage Floors</h3>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <table  class="table table-bordered" id="floors-table"  style="width:100%">
                <thead>
                <tr>
                  <th>number</th>
                  <th>name</th>
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
  var table =  $('#floors-table').DataTable({
        processing: true,
        serverSide: true,
        ajax:{
          url:'{!! route('FloorController.getdata') !!}',
          },
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            {data: 'action', name: 'action', orderable: false, searchable: false},
          
        ]
    });
    $(document).on('click', '.delete', function(){
        var id = $(this).attr('id');
        if(confirm("Are you sure you want to Delete this data?"))
        {
            $.ajax({
                url:"{{route('FloorController.delete')}}",
                mehtod:"get",
                data:{id:id},
                success:function(data)
                {
                    //alert(data);
                    $('#floors-table').DataTable().ajax.reload();
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