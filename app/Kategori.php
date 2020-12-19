<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'nama',
        'gambar'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'kategori_id', 'id')->withTrashed('nama')->withTrashed();
    }
}
