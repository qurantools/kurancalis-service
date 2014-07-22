<?php

class DenemesController extends \BaseController {

	/**
	 * Display a listing of denemes
	 *
	 * @return Response
	 */
	public function index()
	{
		$denemes = Deneme::all();

		return View::make('denemes.index', compact('denemes'));
	}

	/**
	 * Show the form for creating a new deneme
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('denemes.create');
	}

	/**
	 * Store a newly created deneme in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Deneme::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Deneme::create($data);

		return Redirect::route('denemes.index');
	}

	/**
	 * Display the specified deneme.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$deneme = Deneme::findOrFail($id);

		return View::make('denemes.show', compact('deneme'));
	}

	/**
	 * Show the form for editing the specified deneme.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$deneme = Deneme::find($id);

		return View::make('denemes.edit', compact('deneme'));
	}

	/**
	 * Update the specified deneme in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$deneme = Deneme::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Deneme::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$deneme->update($data);

		return Redirect::route('denemes.index');
	}

	/**
	 * Remove the specified deneme from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Deneme::destroy($id);

		return Redirect::route('denemes.index');
	}

}
