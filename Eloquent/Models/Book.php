<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Book
 *
 * @property int $id
 * @property string $title
 * @property int $price
 * @property Author $author
 * @property string|null $description
 * @property CarbonInterface $created_at
 * @property CarbonInterface $updated_at
 */
class Book extends Model
{
    use SoftDeletes;

    public $fillable = [
        'title',
        'price',
        'author_id',
        'description',
    ];

    public $timestamps = true;

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likable');
    }
}
