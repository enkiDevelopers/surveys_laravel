<?php

namespace App\Http\Controllers;

use Enveditor;
use Illuminate\Http\Request;
use DB;
use File;
use Input;

class rootController extends Controller
{
    public function config(Request $request){

        return view('root.config');
	}

	public function home(){

		$todo =	Enveditor::all();

		return view('root.home')->with($todo , 'todo');
	}

	public function manageAdmin(Request $request){

		return view('root.manageAdmin');
	}

}

?>
