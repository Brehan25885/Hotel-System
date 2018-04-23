@extends('layouts.dash')
@section('content')


<form method="post" action="/admins/{{$receptionists->id}}/update">
    {{csrf_field()}}
    
    {{method_field('PUT')}}

name: <input type="text" name="name" value="{{$receptionists->name }}">
email: <input type="text" name="email" value="{{$receptionists->email }}">
country: <input type="text" name="country" value="{{$receptionists->country}}">
gender: <input type="text" name="gender" value="{{$receptionists->gender}}">
<br><br>


</select>


<input type="submit" value="Submit" class="btn btn-primary">
</form>

@endsection

       
       