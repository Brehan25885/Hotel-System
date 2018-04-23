@extends('layouts.dash')
@section('content')


<form method="post" action="/admins/{{$admins->id}}/update">
    {{csrf_field()}}
    
    {{method_field('PUT')}}
  <!--  id: <input type="number" name="id" value="{{$admins->receptionist->id }}" > -->

name: <input type="text" name="name" value="{{$admins->receptionist->name }}">
email: <input type="text" name="email" value="{{$admins->receptionist->email }}">
country: <input type="text" name="country" value="{{$admins->receptionist->country}}">
gender: <input type="text" name="gender" value="{{$admins->receptionist->gender}}">
<br><br>


</select>







<input type="submit" value="Submit" class="btn btn-primary">
</form>

@endsection

       
       