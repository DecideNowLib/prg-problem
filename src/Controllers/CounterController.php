<?php

namespace DecideNowLib\PRGProblem;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;

class CounterController extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
	private $counter_value = 0;
	
	public function index()
	{
		return view('prg_problem::index');
	}
	
	
	/* without redirect */
	
	public function classicFlowGet(Request $request)
	{
		$counter_value = $this->counter_value;
		return view('prg_problem::counter', ['counter_value' => $counter_value, 'test_type' => 'classic']);
	}
	
	public function classicFlowPost(Request $request)
	{
		$counter_value = $request->get('counter_value', 0);
		$counter_value++;

		$this->counter_value = $counter_value;
		return $this->classicFlowGet($request);
	}
	
	
	/* with redirect */
	
	public function prgFlowGet(Request $request)
	{
		$counter_value = Session::get('counter_value', 0);
		return view('prg_problem::counter', [ 'counter_value' => $counter_value, 'test_type' => 'prg']);
	}
	
	public function prgFlowPost(Request $request)
	{
		$counter_value = $request->get('counter_value', 0);
		$counter_value++;
		
		Session::flash('counter_value', $counter_value);
		return redirect('/prg-problem/prg-flow');
	}
	
	
	/* breaking request */
	
	public function breakGet(Request $request)
	{
		$counter_value = 0;
		return view('prg_problem::break', [ 'counter_value' => $counter_value, ]);
	}
	
	public function breakPost(Request $request)
	{
		$counter_value = $request->get('counter_value', 0);
		$counter_value++;
		
		Session::flash('counter_value', $counter_value);
		
		return response()->json(['counter_value' => $counter_value]);
	}
}
