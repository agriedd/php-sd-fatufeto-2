<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SaranaCollection extends JsonResource{
    public function toArray($request){
        return parent::toArray($request);
    }
}
