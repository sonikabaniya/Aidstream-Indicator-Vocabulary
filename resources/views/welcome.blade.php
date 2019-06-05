@extends('base')
@section('bodycontent')
<table class="table table-hover" style="margin:5%">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Indicators</th>
      <th scope="col">No. of Rows</th>
      <th scope="col">Standard Link</th>
    </tr>
  </thead>
  <tbody>
    @foreach($indicators as $indicator)
    
    <tr>
      <th scope="row">{{ $row_num++ }}</th>
      <td><a href="{{ route('searchroute') }}?query1={{ $indicator->vocab }}">{{ $indicator->vocab }}</a></td>
      <td>{{ $indicator->count }}</td>
      <td><a href="#">{{$indicator -> standardlink }}</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection