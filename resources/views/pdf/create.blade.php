@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create PDF</div>

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
                        @if($files->count() > 0)
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
                          @endif

                        <button type="submit" class="btn btn-primary">Create</button>
                   </form>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>

$(document).ready(function() {
    $('.file-selector').select2();
});

</script>
@endsection




