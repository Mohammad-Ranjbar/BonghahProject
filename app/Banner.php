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


    public static function locatedAt($zip,$street)
    {

        $street =str_replace('-',' ',$street);

        return static::where(compact('zip','street'))->first();

    }

    public function addPhoto(Photo $photo)
    {
        return $this->photos()->save($photo);
    }




}
