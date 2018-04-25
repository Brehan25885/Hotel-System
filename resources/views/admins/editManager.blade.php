@extends('layouts.dash')
@section('content')


<form method="post" action="/admins/{{$managers->id}}/updatem" enctype="multipart/form-data">
    {{csrf_field()}}
    
    {{method_field('PUT')}}
  

name: <input type="text" name="name" value="{{$managers->name }}">
email: <input type="text" name="email" value="{{$managers->email }}">
national id: <input type="text" name="national_id" value="{{$managers->national_id}}">
<br><br>


<div class="form-group">
<div class="pull-left image">
<img src="/storage/avatar_images/{{$managers->avatar_image}}" class="img-circle" alt="User Image" width="60" height="80" >
</div>

<label for="image">Update image</label>
<input name="avatar_image" type="file" id="image" class="form-control">
</div>
</select>







<input type="submit" value="Submit" class="btn btn-primary">
</form>

@endsection

       
       