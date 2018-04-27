@extends('layouts.dash')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form method="post" action="/admins/{{$receptionists->id}}/update"  enctype="multipart/form-data">
    {{csrf_field()}}
    
    {{method_field('PUT')}}

name: <input type="text" name="name" value="{{$receptionists->name }}">
email: <input type="text" name="email" value="{{$receptionists->email }}">
password: <input type="text" name="password" value="{{$receptionists->password }}">
<div class="pull-left image">

nationalId: <input type="text" name="national_id" value="{{$receptionists->national_id}}">
<div class="form-group">
<div class="pull-left image">
<img src="/storage/avatar_images/{{$receptionists->avatar_image}}" class="img-circle" alt="User Image" width="60" height="80" >
</div>

<label for="image">Update image</label>
<input name="avatar_image" type="file" id="image" class="form-control">
</div>

<!-- image<input name="avatar_image" id="image" type="file"  accept="image/*"" > 
 -->
 <br><br>


</select>


<input type="submit" value="Submit" class="btn btn-primary">
</form>

@endsection

       
       