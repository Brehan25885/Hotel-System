@extends('layouts.dashManager')
@section('content')
  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            <div class="pull-right">
                    <a class="btn btn-success" href="#">Create new Receptionist</a>
                </div>
              <h3 class="box-title">Manage Receptionists</h3>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <table  class="table table-bordered" id="users-table">
                <thead>
                <tr>
                  <th>name</th>
                  <th>email</th>
                  <th>created_at</th>
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
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax:{
          url:'{!! route('ResptionistController.getdata') !!}',
          type: "GET"
          },
        columns: [
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'created_at', name: 'created_at' }
        ]
    });
});
</script>
@endpush

