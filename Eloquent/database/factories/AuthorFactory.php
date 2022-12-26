<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{
    protected $model = Author::class;

    /**
    * モデルのデフォルト状態の定義
    *
    * @return array
    */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
        ];
    }

    protected static function newFactory()
    {
        return self::new();
    }
}
