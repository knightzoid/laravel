<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookCategory extends Model
{
    protected $fillable = [
        'name',
        'parent_id'
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }

    public function parent()
    {
        return $this->belongsTo(BookCategory::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(BookCategory::class, 'parent_id');
    }
}