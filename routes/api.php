<?php

use Illuminate\Http\Request;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/sap', [ 
   'uses'  => 'SAPController@store',
   'middleware' => ['auth:api', 'scope:post-name']
]);


Route::post('/sapfile', [ 
    'uses'  => 'SapFileController@store',
   
 ]);
 
 