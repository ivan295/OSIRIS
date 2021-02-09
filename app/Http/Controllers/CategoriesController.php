<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
	public function index(){
		return view('Categories.Categories_create');
	}

    public function store(Request $request){

    	dd($request->titulo);
   
   	// return view('Categories.Categories_create');
    }

}
