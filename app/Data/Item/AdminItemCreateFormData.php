<?php

namespace App\Data\Item;

use Spatie\LaravelData\Data;

class AdminItemCreateFormData extends Data
{
    public function __construct(
        public int $game_id,
        public string $name,
        public string $slug,
        public int $cost,
        public ?string $description,
        public bool $is_active,
        public bool $is_listable
    ) {}

    public static function rules(): array
    {
        return [
            'game_id' => ['required', 'integer', 'unique:items,game_id'],
            'name' => ['required', 'string', 'min:1'],
            'slug' => ['required', 'string', 'min:1', 'unique:items,slug'],
            'cost' => ['required', 'integer', 'min:1'],
            'description' => ['nullable', 'string'],
            'is_active' => ['bool'],
            'is_listable' => ['bool'],
        ];
    }
}
