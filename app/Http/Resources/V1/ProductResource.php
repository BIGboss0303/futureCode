<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'categoryId'=>$this->category_id,
            'name'=>$this->name,
            'company'=>$this->company,
            'description'=>$this->description,
            'price'=>$this->price,
            'amount'=>$this->amount

        ];
    }
}
