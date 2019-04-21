<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

    protected $table = 'banner_photos';

    protected $fillable = ['path'];

    public function banner()
    {
        return $this->belongsTo(Banner::class);
    }
}
