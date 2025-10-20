<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class bets extends Model
{
   protected $table = "bets";
   protected $fillable = ['bet_date','sport','confidence','event','bet_type','odds','plan','event_time','analysis']; 
   public $timestamps = false;
}
