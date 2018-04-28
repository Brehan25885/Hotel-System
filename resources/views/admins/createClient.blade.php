@extends('layouts.dash')
@section('content')

<form method="post" action="/adminsc" enctype="multipart/form-data">
{{csrf_field()}}

name :- <input type="text" name="name">
<br><br>
email :- <input type="text" name="email">
<br><br>
password :- <input type="password" name="password">
<br><br>
mobile :- <input type="text" name="mobile">
<br><br>
Country :- <select class="form-control" name="country">
                                @foreach ($countries as $country)
                             <option value="{{ $country['name']}}">{{ $country['name']}}</option>
                                @endforeach
                                </select>
<br><br>
Room Number:-<select class="form-control" name="room">
                                @foreach ($rooms as $room)
                             <option value="{{ $room->number}}">{{ $room->number}}</option>
                                @endforeach
                                </select>
<br>
gender: <select class="form-control" name="gender">
                             <option value="male">male</option>
                             <option value="female">female</option>
                                </select>
<br>

client Creator
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

       