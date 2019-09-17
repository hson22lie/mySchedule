<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScheduleModel extends Model
{
    protected $primary = 'id';
    protected $table = 'schedule';
    public $fillable = [
        'description'
    ];
}
