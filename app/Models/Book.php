<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Publisher;
use App\Models\BookCategory;

class Book extends Model
{
    protected $fillable = [
        'title',
        'description',
        'price',
        'stock',
        'publisher_id'
    ];

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function categories()
    {
        return $this->belongsToMany(BookCategory::class);
    }
}