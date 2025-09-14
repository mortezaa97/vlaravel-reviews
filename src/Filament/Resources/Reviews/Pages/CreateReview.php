<?php

declare(strict_types=1);

namespace Mortezaa97\Reviews\Filament\Resources\Reviews\Pages;

use Mortezaa97\Reviews\Filament\Resources\Reviews\ReviewResource;
use Filament\Resources\Pages\CreateRecord;

class CreateReview extends CreateRecord
{
    protected static string $resource = ReviewResource::class;
}
