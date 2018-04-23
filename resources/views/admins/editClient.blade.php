@extends('layouts.dash')
@section('content')


<form method="post" action="/admins/{{$clients->id}}/updatec">
    {{csrf_field()}}
    
    {{method_field('PUT')}}
  

name: <input type="text" name="name" value="{{$clients->name }}">
email: <input type="text" name="email" value="{{$clients->email }}">
mobile: <input type="text" name="mobile" value="{{$clients->mobile}}">
country: <input type="text" name="country" value="{{$clients->country}}">
gender: <input type="text" name="gender" value="{{$clients->gender}}">
<br><br>


</select>







<input type="submit" value="Submit" class="btn btn-primary">
</form>

@endsection
