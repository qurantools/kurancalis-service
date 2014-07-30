<?php

class Profile extends AbstractProfileModel {

    public $rules = array();

    public function user()
    {
        return $this->belongsTo('User',"user_id");
    }
}
