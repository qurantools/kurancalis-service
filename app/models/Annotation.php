<?php

class Annotation extends AbstractAnnotationModel {

    public $rules = array();
    
    public function user()
    {
    	return $this->belongsTo('User',"user_id");
    }
}
