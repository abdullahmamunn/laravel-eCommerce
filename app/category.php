<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
   protected $fillable = ['cat_name','cat_description','cat_status'];
}
