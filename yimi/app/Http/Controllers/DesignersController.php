<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Designer;
use App\Product;

class DesignersController extends Controller
{
    public function index()
    {
    	$designers = Designer::orderBy('name', 'asc')
    		->paginate(10);

    	return View::make('designers.index')
    		->with('active', 'designers')
    		->with('designers', $designers);
    }

    public function show($slug)
    {
    	$designer = Designer::where('slug', $slug)
    		->first();

    	return View::make('designers.show')
    		->with('active', 'designers')
    		->with('designer', $designer);
    }
}
