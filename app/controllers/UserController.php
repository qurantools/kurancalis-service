<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = User::all();
		return Response::json(array(
				'error' => false,
				'users' => $user->toArray()),
				200
		);
		
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
	    $user = new User;
	    $user->username = Request::get('username');
	    $user->email = Request::get('email');
	    $user->password = Hash::make(Request::get('password'));
 	    $user->name = Request::get('name');

        // Validation and Filtering is sorely needed!!
	    // Seriously, I'm a bad person for leaving that out.
 
    	$user->save();
 
	    return Response::json(
		array(
    		    'error' => false
		),
    		200
	    );
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		// Make sure current user owns the requested resource
	    $user = User::where('id', $id)
	            ->take(1)
	            ->get();
	 
	    return Response::json(array(
	        'error' => false,
	        'users' => $user->toArray()),
	        200
	    );
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = User::find( $id);
		
		if ( Request::get('username') )
		{
			$user->username = Request::get('username');
		}
		
		if ( Request::get('email') )
		{
			$user->email = Request::get('email');
		}
		
		if ( Request::get('name') )
		{
			$user->name = Request::get('name');
		}
		
		if ( Request::get('password') )
		{
			$user->password = Hash::make(Request::get('password'));
		}
		
		
		
		$user->save();
		
		return Response::json(array(
				'error' => false,
				'message' => 'user updated'),
				200
		);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
