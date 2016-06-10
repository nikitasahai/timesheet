<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timesheet extends Model
{
    //
    public $table = "timesheet";  //specified otherwise, by convention laravel looks for table named "timesheets" plural
    public $timestamps = false;		//by convention tries to fill this parameter which isnt in the table
    protected $fillable = ['pname', 'hours', 'description'];	//for mass assignment

}
