<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use sluggable;
    use HasFactory;
    protected $fillable=['index_Id','status','product_name','slug','price','shape','partNo','description','feature','custome'];
    public function attributes()
    {
        return $this->hasMany(ProductsAttribute::class);
        
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function sluggable()
        {
            return [
                'slug' => [
                    'source' => 'product_name'
                ]
            ];
        }
}