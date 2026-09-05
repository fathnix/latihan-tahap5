<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = ['kategori'];

    public function product(): HasMany
    {
        return $this->hasMany(Product::class, 'kategori_id');
    }
}
