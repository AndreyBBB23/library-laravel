<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'surname', 'middle_name', 'year_birth', 'year_death'];
    protected $appends = ['book_count'];

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }

    public function scopeLike($query, $s)
    {
        return $query->where('name', 'LIKE', "%{$s}%");
    }

    public function getBookCountAttribute()
    {
        return $this->books()->count();
    }
}
