@extends('layouts.dash')
@section('content')
        <div class="container">
        <a  class="btn btn-danger" href="admins/create">Create Receptionist</a>
        <br />
        <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <!-- <th>id</th> -->
                <th>name</th>
                <th>email</th>
                <th>country</th>
                <th>gender</th>
                <th></th>
            </tr>
        </thead>
    </table>        </div>
    @stop

       
        @push('scripts')

        <script>
$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,

      ajax: '{!! route('datatable.data') !!}', 
        columns: [
       
             {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'country', name: 'country'},
            {data: 'gender', name: 'gender'},
          
          {data: 'action', name: 'action', orderable: false, searchable: false}
           


        ]
    });
});
</script>
@endpush