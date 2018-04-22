@extends('layouts.dash')
@section('content')


<form method="post" action="/admins/{{$admins->id}}/update">
    {{csrf_field()}}
    
    {{method_field('PUT')}}
   id: <input type="number" name="id" value="{{$admins->receptionist->id }}" >

name: <input type="text" name="name" value="{{$admins->receptionist->name }}">
<br><br>


</select>







<input type="submit" value="Submit" class="btn btn-primary">
</form>

@endsection

       
       