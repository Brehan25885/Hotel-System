@extends('layouts.dash')
@section('content')

<form method="post" action="/admins">
{{csrf_field()}}

name :- <input type="text" name="name">
<br><br>
email :- <input type="text" name="email">
<br><br>
password :- <input type="text" name="password">
<br><br>
country :- <input type="text" name="country">
<br><br>
gender :- <input type="text" name="gender">
<br><br>

Receptionist Creator
<select class="form-control" name="admin_id">
@foreach ($admins as $admin)
    <option value="{{$admin->id}}">{{$admin->name}}</option>
@endforeach

</select>
<br>

<input type="submit" value="Submit" class="btn btn-primary">
</form>


@endsection

       
       