@extends('layouts.dash')
@section('content')
        <div class="container">
        <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>password</th>
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
      ajax: '{!! route('tables.data') !!}', 
        columns: [
            /* { data: 'id', name: 'id' },
            { data: 'name',name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' } */

         {data: 'id', name: 'managers.id'},
            {data: 'name', name: 'managers.name'},
          {data: 'password', name: 'managers.password'}
           


        ]
    });
});
</script>
@endpush