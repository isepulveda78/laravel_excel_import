<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
  </head>
  <body>
  <div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="display-4 text-center">{{$pdf->name}}</h1>
        </div>
    </div>
    <div class="row">
        @if($pdf->file)
            @foreach($pdf->file as $f)
            <div class="col-md-4 p-5">
                <div class="card">
                    <div class="card-body">
                                <ul class="list-unstyled">
                                    <li><b>Style:</b> <span class="float-right">{{ $f->style }}</span></li>
                                    <li><b>Retail:</b> <span class="float-right">{{ $f->retail }}</span></li>
                                    <li><b>UPC:</b> <span class="float-right">{{ $f->upc }}</span></li>
                                    <li><b>Total:</b> <span class="float-right">{{ $f->total }}</span></li>
                                    <li><b>Total Wholesale:</b> <span class="float-right">{{ $f->total_wholesale }}</span></li>
                                    <li><b>Total Cost:</b> <span class="float-right">{{ $f->total_cost }}</span></li>
                                    <li><b>Sales:</b> <span class="float-right">{{ $f->sales }}</span></li>
                                    <li><b>Sell Through:</b> <span class="float-right">{{ $f->sell_through }}</span></li>
                                    <li><b>Ranking:</b> <span class="float-right">{{ $f->ranking }}</span></li>
                                    <li><b>Season:</b> <span class="float-right">{{ $f->season }}</span></li>
                                </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </div>
  </body>
</html>