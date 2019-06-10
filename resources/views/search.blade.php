@extends('base')
@section('bodycontent')
<form action="{{ route('searchroute') }}" method="GET">
      <div style="width:60%; margin:3%;">
      
      <div class="input-group" >
        <div class="input-group mb-3" style="width:30%;" >
          <select class="custom-select" id="inputGroupSelect02"  name="vocabid">
            <option selected style="display:none" >
            </option>
            
            @foreach($vocabs as $vocab)
            <option value="{{ $vocab->vocab }}" {{$vocabid == $vocab->vocab ? 'selected' : ''}}>{{ $vocab->vocab }}</option>
            @endforeach
          </select>
            </div>
            <div style="width:20px; "></div>
            <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" placeholder="Choose any parameter or leave blank ..." name="query">&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="input-group-append">
            <button type="submit" class="btn btn-outline-secondary">Search</button>
            </div>&nbsp;&nbsp;&nbsp;&nbsp;
        </div>
        </div>

        </div>
        </form>

        @if($querymatchs)
        <table  class="table table-hover table-bordered" id="indicatortable" >
                    <thead>
                        <tr>
                        <th scope="col">Vocab</th>
                        <th scope="col">Code</th>
                        <th scope="col">Indicator Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Category</th>
                        <th scope="col">Source</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach($querymatchs as $querymatch)
                    <tr>
                        <td><a href="{{ route('individualvocabroute',['id' => $querymatch->vocabulary->id]) }}">{{ $querymatch->vocabulary->vocab }}</a></td>
                        <td>{{ $querymatch->code }}</td>
                        <td>{{ $querymatch->title }}</td>
                        <td>{{ $querymatch->desc }}</td>
                        <td>{{ $querymatch->category }}</td>
                        <td><a href="{{ $querymatch->source }}">{{ $querymatch->source }}</a></td>
                    </tr>
                        @endforeach

        @else
                No matching results found.
        
        @endif

        

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

        <script type="text/javascript">
        $(document).ready(function() {
        $('#indicatortable').DataTable({
            searching: false
        });
        });
        </script>
@endsection
