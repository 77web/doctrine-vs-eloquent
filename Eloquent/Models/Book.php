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
 */
class Book extends Model
{
    public $fillable = [
        'title',
        'price',
    ];
}
