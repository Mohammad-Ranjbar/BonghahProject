<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class Photo extends Model
{

    protected $table = 'banner_photos';

    protected $fillable = [
                            'path',
                            'name',
                            'thumbnail_path'
                            ];

    protected $baseDir  = 'banners/photos';

    public function banner()
    {
        return $this->belongsTo(Banner::class);
    }


    public static function named($name)
    {
        $photo = new static;

        $photo->saveAs($name);//refactor 2 blow line in saveAs method

        return $photo;

    }



    public function move(UploadedFile $file)
    {
        $file->move($this->baseDir,$this->name);



        return $this;

    }



    public function saveAs($name)
    {
        $this->name             = sprintf("%s-%s",time(),$name);
        $this->path             =sprintf("%s/%s",$this->baseDir,$this->name);
        $this->thumbnail_path   =sprintf("%s/tn-%s",$this->baseDir,$this->name);

    }


}
