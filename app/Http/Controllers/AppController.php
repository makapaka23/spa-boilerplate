<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index()
    {
    	return response()->json([
    		'data' => 'Good Job'
    	], 200);
    }
}
