<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SlideResource extends JsonResource
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
            'id' => $this->id,
            'lecture_id' => $this->lecture_id,
            'background_image_id' => $this->background_image_id,
            'extra_resource' => $this->extra_resource,
            'order' => $this->order,
        ];
    }
}
