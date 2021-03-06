@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if($files->count() > 0)
            <div class="card">
                <div class="card-header">Create PDF from Excel</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('alert'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('alert') }}
                    </div>
                    @endif

                    @if (isset($errors) && $errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif
                   <form action="{{ isset($pdf) ? route('pdf.update', $filename->id) : route('pdf.store') }}" method="post">
                        @csrf
                        @if(isset($post))
                            @method('PUT')
                        @endif
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="file">Name</label>
                                <input type="text" class="form-control" name="name">
                              </div>
                        </div>
                 
                        <div class="form-group">
                            <label for="file">Search and select fields</label>
                            <select name="file[]" id="file" class="form-control file-selector"  multiple="multiple">
                                @foreach($files as $file)
                                <option value="{{ $file->id }}"
                                    @if(isset($pdf))
                                        @if($pdf->hasPdf($file->id))
                                            selected
                                        @endif
                                    @endif
                                    >{{ $file->upc }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                   </form>
            </div>
        </div>
        @else
            <div class="jumbotron">
                <h1 class="display-4">Want to create a PDF from Excel?</h1>
                <hr class="my-4">
                <p>Please upload excel sheet to create a PDF.</p>
                <a class="btn btn-primary btn-lg" href="/pdf/create" role="button">Upload Excel Sheet</a>
            </div>
        @endif
    </div>
</div>
@endsection





