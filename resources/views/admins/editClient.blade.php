@extends('layouts.dash')
@section('content')


<form method="post" action="/admins/{{$clients->id}}/updatec"  enctype="multipart/form-data">
    {{csrf_field()}}
    
    {{method_field('PUT')}}
  

name: <input type="text" name="name" value="{{$clients->name }}">
email: <input type="text" name="email" value="{{$clients->email }}">
mobile: <input type="text" name="mobile" value="{{$clients->mobile}}">
country: <input type="text" name="country" value="{{$clients->country}}">
gender: <input type="text" name="gender" value="{{$clients->gender}}">
<br><br>
<div class="form-group">
<div class="pull-left image">
<img src="/storage/avatar_images/{{$clients->avatar_image}}" class="img-circle" alt="User Image" width="60" height="80" >
</div>

<label for="image">Update image</label>
<input name="avatar_image" type="file" id="image" class="form-control">
</div>

</select>







<input type="submit" value="Submit" class="btn btn-primary">
</form>

@endsection
