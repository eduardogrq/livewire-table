<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Post extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

//    public function registerMediaCollections(): void
//    {
//        $this
//            ->registerMediaCollections('avatars')
//            ->useDisk('media');
//    }

//    Register a conversion that allow us to store a file specifying values or type of data

//    public function registerMediaConversions(Media $media = null): void
//    {
//        $this
//            ->addMediaConversion('thumb')
//            ->width(50)
//            ->height(50);
//    }

}
