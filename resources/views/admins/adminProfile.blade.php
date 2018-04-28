@extends('layouts.dash')
@section('content')


<form method="post" action="/admins/{{$users->id}}/updatep"  enctype="multipart/form-data">
    {{csrf_field()}}
    
    {{method_field('PUT')}}
  

name: <input type="text" name="name" value="{{$users->name }}">
email: <input type="text" name="email" value="{{$users->email }}">










<input type="submit" value="Submit" class="btn btn-primary">
</form>

@endsection
