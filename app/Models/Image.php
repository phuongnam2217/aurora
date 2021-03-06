<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = ['image','product_id'];
    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    function getNameImage(){
        return 'https://storagecase3.s3.amazonaws.com/' .$this->image;
    }
}
