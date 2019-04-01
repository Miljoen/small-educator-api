<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
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
            'question_text' => $this->question_text,
            'multi_select' => $this->multi_select,
            'answers' => AnswerResource::collection($this->whenLoaded('answers')),
        ];
    }
}
