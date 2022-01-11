<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskList extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            // "user_id" => $this->user_id,
            "name" => $this->name,
            "number of tasks" => $this->tasks->count(),
            // "tasks" => $this->tasks,
            // 'created_at' => $this->created_at->format('d-m-Y'),
            // 'updated_at' => $this->updated_at->format('d-m-Y')
        ];
    }
}
