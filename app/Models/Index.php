<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Index extends Model
{
    public $table = 'indexes';
    use HasFactory;
    use sluggable;
    protected $fillable=['title','slug','description','image','category_id'];
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
