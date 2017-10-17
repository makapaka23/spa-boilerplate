<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\JWTAuth;
use App\User;
use App\Http\Requests\Auth\{RegisterFormRequest, LoginFormRequest};
use Tymon\JWTAuth\Exceptions\{JWTException};

class AuthController extends Controller
{

	protected $auth;

    public function __construct(JWTAuth $auth) 
    {
    	$this->auth = $auth;
    }

    public function login(LoginFormRequest $request)
    {
    	try {
    		if (!$token = $this->auth->attempt($request->only('email', 'password'))) {
    			return response()->json([
    				'errors' => [
    					'root' => 'Sorry, your login failed'
    				]
    			], 401);
    		}

    	} catch(JWTException $e) {
    		return response()->json([
    			'errors' => [
    				'root' => 'Auth exception'
    			]
    		], $e->getStatusCode());
    	}

    	return response()->json([
    		'data' => $request->user(),
    		'meta' => [
    			'token' => $token
    		]
    	], 200);

    }

    public function register(RegisterFormRequest $request) 
    {
    	//var_dump($request->ip());die;

    	$user = User::create([
    		'name' => $request->name,
    		'email' => $request->email,
    		'password' => bcrypt($request->password)
    	]);

    	$token = $this->auth->attempt($request->only('email', 'password'));
    	
    	return response()->json([
    		'data' => $user,
    		'meta' => [
    			'token' => $token
    		]
    	], 200);

    }

    public function logout()
    {
    	$this->auth->invalidate($this->auth->getToken());

    	return response(null, 200);
    }

    public function user(Request $request) 
    {
    	return response()->json([
    		'data' => $request->user()
    	]);
    }
}
