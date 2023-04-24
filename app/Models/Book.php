<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    use HasFactory;

    protected $casts = [
        'published_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $fillable = [
        'name',
        'copies_sold',
        'published_at',
    ];

    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(Author::class, 'books_authors', 'book_id', 'author_id');
    }

    public function scopeByAuthor(Builder $query, string $search): Builder
    {
        return $query->whereRelation('authors', function(Builder $builder) use ($search) {
            $builder->where('name', 'LIKE', "%$search%")
                ->orWhere('id', '=', $search);
        });
    }
}
