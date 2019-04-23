<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Photo extends Model
{

    protected $table = 'banner_photos';

    protected $fillable = ['path'];

    protected $baseDir  = 'banners/photos';

    public function banner()
    {
        return $this->belongsTo(Banner::class);
    }


    public static function fromForm(UploadedFile $file)
    {
        $photo = new static;

        $name = time() .$file->getClientOriginalName();

        $photo->path = $photo->baseDir . DIRECTORY_SEPARATOR . $name;

        $file->move($photo->baseDir,$name);

        return $photo;
    }


}
