<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
      return [
        'id' => $this->id,
        'name' => $this->name,
        'completed' => ($this->completed) ? true : false,
        'completed_at' => (string) $this->completed_at,
        'order' => $this->order
      ];
    }
}
