@extends('layouts.dashManager')
@section('content')
  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('ResptionistController.create') }}">Create new Receptionist</a>
                </div>
              <h3 class="box-title">Manage Receptionists</h3>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <table  class="table table-bordered" id="users-table"  style="width:100%">
                <thead>
                <tr>
                  <th>name</th>
                  <th>email</th>
                  <th>created_at</th>
                  <th>profileImage</th>
                  <th>Action</th>
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
  var table =  $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax:{
          url:'{!! route('ResptionistController.getdata') !!}',
          },
        columns: [
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'created_at', name: 'created_at' },
            {data: 'avatar_image', name: 'avatar_image',
            "render": function(data, type, row) {
        return '<img src="/storage/avatar_images/'+data+'" />';
                 }   }, 
            {data: 'action', name: 'action', orderable: false, searchable: false},
          
        ]
    });
    $(document).on('click', '.delete', function(){
        var id = $(this).attr('id');
        if(confirm("Are you sure you want to Delete this data?"))
        {
            $.ajax({
                url:"{{route('ResptionistController.delete')}}",
                mehtod:"get",
                data:{id:id},
                success:function(data)
                {
                    //alert(data);
                    $('#users-table').DataTable().ajax.reload();
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

