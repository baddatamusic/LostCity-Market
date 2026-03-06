<?php

namespace App\Pages\Admin;

use App\Data\Item\AdminItemCreateFormData;
use Spatie\LaravelData\Data;

class ItemsCreatePage extends Data
{
    public function __construct(
        public AdminItemCreateFormData $itemForm
    ) {}
}
