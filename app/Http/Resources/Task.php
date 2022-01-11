<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Task extends JsonResource
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
            'list name' => $this->list->name,
            'task name' => $this->title,
            'task description' => $this->description,
            'task status' => $this->status,
            'task due date' => $this->due_date
        ];
    }
}
