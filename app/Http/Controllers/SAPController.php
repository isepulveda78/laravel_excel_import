<?php

namespace App\Http\Controllers;

use App\SAP;
use Illuminate\Http\Request;

class SAPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sap.index');
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
        $this->validate($request, [
            'name' => 'required'
        ]);

        $sap = SAP::create([
            'name' => $request->name
        ]);

        return $sap;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\SAP  $sAP
     * @return \Illuminate\Http\Response
     */
    public function show(SAP $SAP)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SAP  $sAP
     * @return \Illuminate\Http\Response
     */
    public function edit(SAP $SAP)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SAP  $sAP
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SAP $SAP)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SAP  $sAP
     * @return \Illuminate\Http\Response
     */
    public function destroy(SAP $SAP)
    {
        //
    }
}
