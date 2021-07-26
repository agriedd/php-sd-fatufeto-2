<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PrasaranaCollection extends JsonResource{
    public function toArray($request){
        return parent::toArray($request);
    }
}
