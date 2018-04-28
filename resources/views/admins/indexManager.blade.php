@extends('layouts.dash')
@section('content')
        <div class="container">
        <br />
        <a  class="btn btn-danger" href="admins/createm">Create Manager</a>
        <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                
                <th>name</th>
                <th>email</th>
                <th>national_id</th>
                <th>avatar_image</th>
        <!--  -->        <th></th>
               
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
        dom:'Bfrtip',
      ajax: '{!! route('tables.data') !!}', 
        columns: [
          
            {data: 'name', name: 'name'},
          {data: 'email', name: 'email'},
          {data: 'national_id', name: 'national_id'},
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
                url:"{{route('tables.datadestroyManager')}}",
                mehtod:"get",
                data:{id:id},
                success:function(data)
                {
                    alert(data);
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