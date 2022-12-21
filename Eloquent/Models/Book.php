<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Book
 *
 * @property int $id
 * @property string $title
 * @property int $price
 * @property Author $author
 * @property string|null $description
 */
class Book extends Model
{
    public $fillable = [
        'title',
        'price',
        'author_id',
        'description',
    ];

    public $timestamps = false;

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likable');
    }
}
