<?php

Route::group(['middleware' => ['web']], function () {

	Route::get('/prg-problem', 'DecideNowLib\PRGProblem\CounterController@index');
	
	Route::get('/prg-problem/classic-flow', 'DecideNowLib\PRGProblem\CounterController@classicFlowGet');
	Route::post('/prg-problem/classic-flow', 'DecideNowLib\PRGProblem\CounterController@classicFlowPost');
	
	Route::get('/prg-problem/prg-flow', 'DecideNowLib\PRGProblem\CounterController@prgFlowGet');
	Route::post('/prg-problem/prg-flow', 'DecideNowLib\PRGProblem\CounterController@prgFlowPost');
	
	Route::get('/prg-problem/break', 'DecideNowLib\PRGProblem\CounterController@breakGet');
	Route::post('/prg-problem/break', 'DecideNowLib\PRGProblem\CounterController@breakPost');

});