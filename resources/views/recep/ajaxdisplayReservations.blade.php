@extends('layouts.dashRecep')
@section('content')
        <div class="container">
        <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Client Name</th>
                <th>Client Accompany No</th>
                <th> Room No</th>
                <th>Paid Price</th>
                
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
        dom: 'Bfrtip',
        ajax: '{!! route('reserve.datareservations') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'client_accompany_no', name: 'client_accompany_no' },
            { data: 'room_number', name: 'room_number' },
            { data: 'paid_price', name: 'paid_price' },
         
        ]
     
    });
   
});

</script>
@endpush
