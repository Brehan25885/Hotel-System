@extends('layouts.dash')
@section('content')

<form method="post" action="/adminsm">
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

<input type="submit" value="Submit" class="btn btn-primary">
</form>


@endsection

       