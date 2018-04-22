@extends('layouts.app')
@section('content')

  <div container>
  <table  class="table">
  <tbody>
  @foreach ($clients as $client)
  <tr>
  <td>
  {{$client->name}}
  </td>
<td>{{$client->email}}
</td>
<td>{{$client->mobile}}
</td>
<td>{{$client->gender}}
</td>
<td>{{$client->country}}
</td>
<td>{{$client->is_approved}}
</td>
<td>
<form method="GET" action="/clients/{{$client->id}}/approve" >
    {{csrf_field()}}
    <button type="submit" class="btn btn-primary" > approve </button>
</form>
</td>
  </tr>

  </tbody>
  </table>
  @endforeach
</div>
@endsection