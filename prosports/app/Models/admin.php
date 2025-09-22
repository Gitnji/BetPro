<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = "users";
    protected $fillable = ['username', 'email', 'created_at'];
}
