<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeyondTheBook extends Model
{
    use HasFactory;
    protected $fillable = ['title','type', 'category_id', 'description', 'alt', 'file_path','link', 'video_link', 'status'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function userProgress()
    {
        return $this->hasMany(Resource::class, 'resource_id')->where('resource_type', 'beyond_the_books');
    }
}

