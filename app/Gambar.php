<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Gambar extends Model{
    protected $table = "tbl_gambar";
    protected $guarded = [];
    protected $appends = ['url'];
    
    public function gambarable(){
        return $this->morphTo();
    }

    public function getUrlAttribute(){
        if(Storage::exists($this->src))
            return Storage::url($this->src);
        return null;
    }

}
