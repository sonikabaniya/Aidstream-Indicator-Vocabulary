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
    @foreach($vocabs as $key => $vocab)
    
    <tr>
      <th scope="row">{{ $key+1 }}</th>
      <td><a href="{{ route('searchroute') }}?query1={{ $vocab->vocab }}">{{ $vocab->vocab }}</a></td>
      <td>{{ count($vocab->indicators) }}</td>
      <td><a href="{{ $vocab-> standardlink }}">{{ $vocab-> standardlink }}</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection