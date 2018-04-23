@extends('layouts.dash')
@section('content')


<form method="post" action="/admins/{{$managers->id}}/updatem">
    {{csrf_field()}}
    
    {{method_field('PUT')}}
  

name: <input type="text" name="name" value="{{$managers->name }}">
email: <input type="text" name="email" value="{{$managers->email }}">
national id: <input type="text" name="national_id" value="{{$managers->national_id}}">
<br><br>


</select>







<input type="submit" value="Submit" class="btn btn-primary">
</form>

@endsection

       
       