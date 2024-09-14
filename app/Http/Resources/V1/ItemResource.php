<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

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
        ;
        return [
            "id"=>$this->id,
            "name"=>$this->name,
            'description'=>$this->description,
            'image'=>$this->image,
            'rating'=>$this->rating,
            'popular'=>$this->popular,
            'favorite'=>$this->isFavoriteByUser(Auth::user()->id)? '1':'0',
            'category_name' => $this->category ? $this->category->name : null,
            'prices'=>PricesItemResource::collection($this->prices),
            'images'=>ImagesItemResource::collection($this->images),
        ];
    }
}
