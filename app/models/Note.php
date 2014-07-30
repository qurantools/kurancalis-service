<?php
require_once ("AbstractNoteModel.php");

class Note extends AbstractNoteModel {

    public static $rules = array();
    
    public function user()
    {
    	return $this->belongsTo('User',"user_id");
    }
    
}
