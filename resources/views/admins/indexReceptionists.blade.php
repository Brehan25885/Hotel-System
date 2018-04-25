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
                <th>national_id</th>
                <th>avatar_image</th>
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
       
             {data: 'name'
             , name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'national_id', name: 'national_id'},
          
            {data: 'avatar_image', name: 'avatar_image',
            "render": function(data, type, row) {
        return '<img src="/storage/avatar_images/'+data+'" />';
                 }   }, 
          
          
          {data: 'action', name: 'action', orderable: false, searchable: false}
           


        ]
    });
});
</script>
@endpush