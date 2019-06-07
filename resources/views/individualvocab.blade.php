@extends('base')
@section('bodycontent')

<div class="indVocabDiv">
<h2 class="indVocabDiv--title">{{ $mapvocab->vocab }} &nbsp; &nbsp;Code={{ $id }} &nbsp; &nbsp;<a href="{{ $mapvocab->standardlink }}">{{ $mapvocab->standardlink }}</a></h2>


<table class="table table-hover table-bordered indVocabDiv__table-first">
  <thead>
    <tr>
      <th scope="col">Categories</th>
      <th scope="col">No Of Categories</th>
    </tr>
  </thead>
  <tbody>
      @foreach($vocabs as $vocab)
    <tr>
      <td>{{ $vocab->category == "" ? 'Uncategorized' : $vocab->category }}</td>
      <td>{{ $vocab->count }}</td>

    </tr>
      @endforeach
   
  </tbody>
</table>

<table class="table table-hover table-bordered indVocabDiv__table-second">
  <thead>

    <tr>
      <th scope="col">Code</th>
      <th scope="col">Indicator Text</th>
      <th scope="col">Desciption</th>
      <th scope="col">Link</th>

    </tr>
  </thead>
  <tbody>
  @foreach($downvocabs as $vocab)

    <tr>
      <th >{{ $vocab->code }}</th>
      <td>{{ $vocab->title }}</td>
      <td>{{ $vocab->desc }}</td>
      <td>{{ $vocab->source }}</td>
    </tr>
  @endforeach 
  </tbody>
</table>
</div>

@endsection
