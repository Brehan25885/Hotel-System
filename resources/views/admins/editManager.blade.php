@extends('layouts.dash')
@section('content')


<form method="post" action="/admins/{{$admins->id}}/updatem">
    {{csrf_field()}}
    
    {{method_field('PUT')}}
  

name: <input type="text" name="name" value="{{$admins->manager->name }}">
email: <input type="text" name="email" value="{{$admins->manager->email }}">
national id: <input type="text" name="national_id" value="{{$admins->manager->national_id}}">
<br><br>


</select>







<input type="submit" value="Submit" class="btn btn-primary">
</form>

@endsection

       
       