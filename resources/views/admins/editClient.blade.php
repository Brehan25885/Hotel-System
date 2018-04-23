@extends('layouts.dash')
@section('content')


<form method="post" action="/admins/{{$admins->id}}/updatec">
    {{csrf_field()}}
    
    {{method_field('PUT')}}
  

name: <input type="text" name="name" value="{{$admins->client->name }}">
email: <input type="text" name="email" value="{{$admins->client->email }}">
mobile: <input type="text" name="mobile" value="{{$admins->client->mobile}}">
country: <input type="text" name="country" value="{{$admins->client->country}}">
gender: <input type="text" name="gender" value="{{$admins->client->gender}}">
<br><br>


</select>







<input type="submit" value="Submit" class="btn btn-primary">
</form>

@endsection
