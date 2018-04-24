@extends('layouts.dash')
@section('content')
        <div class="container">
        <a  class="btn btn-danger" href="admins/createc">Create Client</a>
        <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                
                <th>name</th>
                <th>email</th>
                <th>mobile</th>
                <th>country</th>
                <th>gender</th>
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
/*         ajax: 'https://datatables.yajrabox.com/eloquent/joins-data',
 */
      ajax: '{!! route('datatables.data') !!}', 
        columns: [
         
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
          {data: 'mobile', name: 'mobile'},
          {data: 'country', name: 'country'},
         
          {data: 'gender', name: 'gender'},
           {data: 'avatar_image', name: 'avatar_image',
            "render": function(data, type, row) {
        return '<img src="/storage/avatar_images/'+data+'" />';
                 }   }, 
          
          {data: 'action', name: 'action', orderable: false, searchable: false},
           


        ]
    });
});



</script>
@endpush