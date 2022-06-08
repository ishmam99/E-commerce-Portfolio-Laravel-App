<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable=['sub_category_id','name','price','image_one','image_two','image_three','details'];

    public function subCategory() :BelongsTo
    {
        return $this->belongsTo(SubCategory::class,'sub_category_id');
    }
}
