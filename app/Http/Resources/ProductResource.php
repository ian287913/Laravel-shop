<?php

namespace App\Http\Resources;

use App\Category;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'size' => $this->size,
            'cpu' => $this->cpu,
            'gpu' => $this->gpu,
            'ram' => $this->ram,
            'storage' => $this->storage,
            'description' => $this->description,
            'brand' => $this->category->name,
            'os'=>$this->os->name,
            'img' => $this->img,
            'tags' => $this->tags,
            'created_at' => $this->created_at->format('Y/m/d H:i:s'),
            'updated_at' => $this->updated_at->format('Y/m/d H:i:s'),
        ];
    }
}
