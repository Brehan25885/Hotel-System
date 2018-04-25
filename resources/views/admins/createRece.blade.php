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

<form class="form-horizontal" method="post" action="/admins"  enctype="multipart/form-data">
{{csrf_field()}}

name :- <input type="text" name="name">
<br><br>
email :- <input type="text" name="email">
<br><br>
password :- <input type="text" name="password">
<br><br>
country :- <input type="text" name="national_id">
<br><br>


Receptionist Creator
<select class="form-control" name="admin_id">
@foreach ($admins as $admin)
    <option value="{{$admin->id}}">{{$admin->name}}</option>
@endforeach

</select>
<br>

<label for="image">Upload image</label>
<input name="avatar_image" type="file" id="image" class="form-control">

<input type="submit" value="Submit" class="btn btn-primary">
</form>


@endsection

       
       