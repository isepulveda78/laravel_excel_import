<?php

namespace App\Http\Controllers;

use App\SapFile;
use Illuminate\Http\Request;

class SapFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(SapFile $sapFile, Request $request)
    {
        $sap = SapFile::create(($this->validateData()));

        $this->sapRequest($sapFile, $request);

        return $sap;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SapFile  $sapFile
     * @return \Illuminate\Http\Response
     */
    public function show(SapFile $sapFile)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SapFile  $sapFile
     * @return \Illuminate\Http\Response
     */
    public function edit(SapFile $sapFile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SapFile  $sapFile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SapFile $sapFile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SapFile  $sapFile
     * @return \Illuminate\Http\Response
     */
    public function destroy(SapFile $sapFile)
    {

    }

    private function validateData()
    {
        return request()->validate([
            'name' => 'required',
            'sapfiles' => 'required',
        ]);
    }

    
    private function sapRequest(SapFile $sapFile, Request $request)
    {   $sap = $this->getSapFile($request);
        $sap_array = [];
        foreach(array_collapse($sap) as $sap_data) {
            array_push($sap_array,$sap_data['id']);
        }
    }

    private function getSapFile(Request $request)
    {
        $data = $request->only([
            'sapfiles'
        ]);

        return $data;
    }
}
