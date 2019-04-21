<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{

    protected $fillable=[
        'street',
        'city',
        'zip',
        'state',
        'country',
        'price',
        'description'



    ];

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function getPriceAttribute($price)
    {
        return '$'.number_format($price);
    }

    public function getDescriptionAttribute($description)
    {
        return nl2br($description);
    }


    public function scopeLocatedAt($query,$zip,$street)
    {

        $street =str_replace('-',' ',$street);

        return $query->where(compact('zip','street'));

    }


}
