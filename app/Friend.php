<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    protected $fillable = ['friend_name', 'friend_age', 'bio', 'is_approved'];
}
