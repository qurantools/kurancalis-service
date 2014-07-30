<?php

use Illuminate\Http\Request;

class VerseLinkController extends AbstractVerseLinkController {

    //modify this class for your advanced needs of resource controller.
    //this file is generated one and will not overwrite your modifications

	public function outgoings()
	{
		$user = Auth::user();
		$chapter = Input::get('chapter');
		$verse = Input::get('verse');
		$links  =	VerseLink::where('user_id', '=', $user->id)
							->where('source_chapter', '=', $chapter)
							->where('source_verse', '=', $verse)->get();
		
		return Response::json(array(
                'error' => false,
                'verselink_list' => $links),
                200
        );
        
	}
	
	public function incomings()
	{
		$user = Auth::user();
		$chapter = Input::get('chapter');
		$verse = Input::get('verse');
		$links  = VerseLink::where('user_id', '=', $user->id)
					->where('target_chapter', '=', $chapter)
					->where('target_verse', '=', $verse)->get();
		return Response::json(array(
                'error' => false,
                'verselink_list' => $links),
                200
        );
	}
}
