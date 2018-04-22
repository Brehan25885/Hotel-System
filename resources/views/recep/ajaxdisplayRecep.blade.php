@extends('layouts.dashRecep')
@section('content')
        <div class="container">
        <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th> Mobile</th>
                <th>Country</th>
                <th>Gender</th>
                <th>Is Approved</th>
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
        ajax: '{!! route('datatables.data') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'mobile', name: 'mobile' },
            { data: 'country', name: 'country' },
            { data: 'gender', name: 'gender' },
            { data: 'is_approved', name: 'is_approved' }

        ]
    });
});
</script>
@endpush
