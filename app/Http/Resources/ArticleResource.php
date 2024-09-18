<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'image' => asset('storage/articles'.$this->image),
            'category' => $this->category->name,
            'tags' => $this->tags->pluck('name')->implode(', '),
            'created_at' => $this->created_at->diffForHumans(),
        ];
    }
}
