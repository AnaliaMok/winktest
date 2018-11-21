<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WinkPost extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
        // return [
        //     'slug'                      => $this->slug,
        //     'title'                     => $this->title,
        //     'excerpt'                   => $this->excerpt,
        //     'body'                      => $this->body,
        //     'published_date'            => $this->published_data,
        //     'featured_image'            => $this->featured_image,
        //     'featured_image_caption'    => $this->featured_image_caption,
        //     'author_id'                 => $this->author_id,
        //     'meta'                      => $this->meta
        // ];
    }
}
