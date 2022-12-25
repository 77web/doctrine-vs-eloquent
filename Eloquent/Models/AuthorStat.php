<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AuthorStat
 *
 * @property int $id
 * @property string $name
 * @property int $booksCount
 */
class AuthorStat extends Model
{
    public $table = 'author_stat';
}
