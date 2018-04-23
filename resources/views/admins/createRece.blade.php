@extends('layouts.dash')
@section('content')

<form method="post" action="/admins">
{{csrf_field()}}

Title :- <input type="text" name="name">
<br><br>
Description :- 
<textarea name="password"></textarea>
<br>

<br>
<input type="submit" value="Submit" class="btn btn-primary">
</form>


@endsection

       
       