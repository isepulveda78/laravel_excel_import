<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\ValidationException;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('upload');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->file('file'))
        {
            $file = $request->file('file')->store('import');
            $import = new UsersImport;
            $import->import($file);

            if(count($import->failures())) {
                //dd($import->failures());
                session()->flash('alert', 'Check Headers');
                return back();
            }
            session()->flash('status', 'File uploaded');
            return back();
            

        } else {
            session()->flash('alert', 'There is no file to upload.');
            return back();
        }
      
        if ($import->failures()->isNotEmpty()) {
            return back()->withFailures($import->failures());
        }

    }
    private function validateData()
    {
        return request()->validate([
            'user_id' => 'required',
            'style' => 'required',
            'upc' => 'required',
            'total' => 'required',
            'retail' => 'required',
            'total_cost' => 'required',
            'total_wholesale' => 'required',
            'sales' => 'required',
            'sell_through' => 'required',
            'ranking' => 'required',
            'season' => 'required',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\file  $file
     * @return \Illuminate\Http\Response
     */
    public function show(file $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\file  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(file $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\file  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, file $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\file  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(file $file)
    {
        //
    }
}
