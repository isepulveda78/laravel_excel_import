@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
      @if($pdf -> count() > 0)
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Filename</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                @foreach($pdf as $p)
                <th scope="row">1</th>
                <td>{{ $p->name }}</td>
                <td><a href="{{ route('pdf.show', $p->id ) }}" type="button" class="btn btn-primary btn-sm">View</a></td>
                <td><a href="{{ route('download.pdf', $p->id ) }}" type="button" class="btn btn-success btn-sm">Export to PDF</button></td>
                <td><a href="" type="button" class="btn btn-danger btn-sm">Delete</button></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        @endif
    </div>
</div>

@endsection