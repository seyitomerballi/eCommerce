<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function subcategories()
    {
        return $this->hasMany(Category::class,'parent_id')->where('status',1);
    }

    public function section()
    {
        return $this->belongsTo(Section::class,'section_id');
    }

    public function parent_category()
    {
        return $this->belongsTo(Category::class,'parent_id')
            ->withDefault(['category_name' => 'Root Category']);
    }
}
