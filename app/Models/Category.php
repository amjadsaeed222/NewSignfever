<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use sluggable;
    use HasFactory;
    protected $fillable=['status','name','description','parent_id','slug','image'];
     public function product()
     {
         //return $this->hasMany('App\Models\Product','id');
         return $this->hasMany(Product::class);
     } 
    
    public function sluggable()
        {
            return [
                'slug' => [
                    'source' => 'name'
                ]
            ];
        }
}