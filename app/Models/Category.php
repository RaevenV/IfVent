<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'file_path'];

    public function ebooks()
    {
        return $this->hasMany(Ebook::class);
    }

    public function audioBooks()
    {
        return $this->hasMany(AudioBook::class);
    }


    public function beyondTheBooks()
    {
        return $this->hasMany(BeyondTheBook::class);
    }
}

