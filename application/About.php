<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class About extends Authenticatable
{

   protected $table = "about";
    protected $primaryKey = "id";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "id",
        "about_us",
        "about_icon",
        "about_icon2",
         "who_we",
        "title1",
        "title2",
        "who_we_icon",
        "who_we_icon2",
    ];
}
