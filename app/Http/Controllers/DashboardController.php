<?php
/**
 * Created by Paul Livorsi.
 * User: paul
 * Date: 10/19/18
 * Time: 2:12 AM
 */

namespace App\Http\Controllers;


class DashboardController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function show(){
		return view('dashboard');
	}
}