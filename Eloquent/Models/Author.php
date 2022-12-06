<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Author
 *
 * @property int $id
 * @property string $name
 */
class Author extends Model
{
    public $fillable = [
        'name',
    ];
}
