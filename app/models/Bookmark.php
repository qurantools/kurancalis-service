<?php

class Bookmark extends AbstractBookmarkModel {

    public $rules = array();
    
    public function user()
    {
    	return $this->belongsTo('User',"user_id");
    }
}
