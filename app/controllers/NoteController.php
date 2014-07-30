<?php

class NoteController extends AbstractNoteController {

    //modify this class for your advanced needs of resource controller.
    //this file is generated one and will not overwrite your modifications

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = Auth::user();
		return Response::json(array(
				'error' => false,
				'note_list' => $user->notes),
				200
		);
	}

}
