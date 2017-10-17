<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogBookController extends Controller
{
    public function index()
    {
    	return response()->json([
    		'data' => 'INDEX: Good Job'
    	], 200);
    }
}
