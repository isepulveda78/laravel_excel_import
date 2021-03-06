<?php

namespace App\Http\Controllers;

use App\Pdf;
use App\File;
use PDF as PDFILE;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pdf.index')->with('pdf', Pdf::all());
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pdf.create')->with('files', File::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $filename = Pdf::create($this->validateData());

         if($request->file){
            $filename->file()->attach($request->file);
        }

        return redirect(route('pdf.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Filename  $filename
     * @return \Illuminate\Http\Response
     */
    public function show(Pdf $pdf)
    {
        return view('pdf.show')->with('pdf', $pdf);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Filename  $filename
     * @return \Illuminate\Http\Response
     */
    public function edit(Pdf $pdf)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Filename  $filename
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pdf $pdf)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Filename  $filename
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pdf $pdf)
    {
        //
    }

    private function validateData()
    {
        return request()->validate([
            'name' => 'required',
        ]);
    }

    public function pdf(Pdf $pdf)
    {
        $pdfFile = PDFILE::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif'])->loadView('pdf.show', compact('pdf'));
        return $pdfFile->download('closeout.pdf');
    }
}
