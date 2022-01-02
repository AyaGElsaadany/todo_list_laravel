<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task_list extends Model
{
    protected $table = 'task_lists';

    protected $fillable = ['name', 'user_id'];

    public function user(){
        return $this->belongsTo('\App\User', 'user_id');
    }

    public function tasks(){
        return $this->hasMany('\App\Task', 'list_id');
    }
}
