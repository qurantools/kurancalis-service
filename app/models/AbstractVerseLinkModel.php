<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class AbstractVerseLinkModel extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = "verselink";

    public $timestamps = false;
    
    public $primaryKey = "id";
    
    
}
