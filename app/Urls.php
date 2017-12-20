<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class urls extends Model
{

    protected $fillable = ["shorted", "link"];

    public $timestamps = false;
}
