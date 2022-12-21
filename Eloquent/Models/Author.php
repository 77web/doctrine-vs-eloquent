<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Author
 *
 * @property int $id
 * @property string $name
 * @property Collection<Book> $books
 */
class Author extends Model
{
    public $fillable = [
        'name',
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likable');
    }
}
