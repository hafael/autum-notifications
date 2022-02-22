<?php

namespace Autum\Notifications\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
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
            'id' => $this->resource->id,
            'notifiable_id' => $this->resource->notifiable_id,
            'notifiable_type' => class_basename($this->resource->notifiable_type),
            'type' => class_basename($this->resource->type),
            'data' => $this->resource->data,
            'read_at' => $this->read_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
