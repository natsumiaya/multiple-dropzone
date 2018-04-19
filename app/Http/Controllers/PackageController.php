<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PackageController extends Controller
{
	public function packageForm(){
		return view('pages.packageform');
	}

	public function packageList(){
		return view('pages.packagelist');
	}
}

?>