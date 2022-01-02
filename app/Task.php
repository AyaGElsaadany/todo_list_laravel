<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    protected $fillable = ['list_id', 'title', 'due_date', 'description', 'status'];

    public function list(){
        return $this->belongsTo('\App\Task_list', 'list_id');
    }
}
