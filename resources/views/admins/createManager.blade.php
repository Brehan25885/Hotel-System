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

<form method="post" action="/adminsm"  enctype="multipart/form-data">
{{csrf_field()}}

name :- <input type="text" name="name">
<br><br>
email :- <input type="text" name="email">
<br><br>
password :- <input type="text" name="password">
<br><br>
national id :- <input type="text" name="national_id">
<br><br>

Manager Creator
<select class="form-control" name="admin_id">
@foreach ($admins as $admin)
    <option value="{{$admin->id}}">{{$admin->name}}</option>
@endforeach

</select>
<br>
<label for="image">Upload image</label>
<input name="avatar_image" type="file" id="image">


<input type="submit" value="Submit" class="btn btn-primary">
</form>


@endsection

       