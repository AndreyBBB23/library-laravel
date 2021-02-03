<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'year_publication'];
    protected $appends = ['list_authors'];

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

    public function scopeLike($query, $s)
    {
        return $query->where('title', 'LIKE', "%{$s}%");
    }

    public function getListAuthorsAttribute()
    {
        $authors = $this->authors()->get()->toArray();
        $response = [];

        foreach ($authors as $author) {
            unset($author['book_count']);
            unset($author['pivot']);

            $author['name'] = Str::limit($author['name'], 1, '.');
            $author['middle_name'] = Str::limit($author['middle_name'], 1, '.');

            $authorArray = [
                'surname' => $author['surname'],
                'name' => $author['name'],
                'middle_name' => $author['middle_name'],
            ];

            $response[] = implode(' ', $authorArray);
        }

        return $response;
    }
}
