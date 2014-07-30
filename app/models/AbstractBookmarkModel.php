<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class AbstractBookmarkModel extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = "bookmark";

    public $timestamps = false;
    
    public $primaryKey = "id";
    
    
}
