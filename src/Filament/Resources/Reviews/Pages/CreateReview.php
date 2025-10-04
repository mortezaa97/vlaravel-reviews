<?php

declare(strict_types=1);

namespace Mortezaa97\Reviews\Filament\Resources\Reviews\Pages;

use Filament\Resources\Pages\CreateRecord;
use Mortezaa97\Reviews\Filament\Resources\Reviews\ReviewResource;

class CreateReview extends CreateRecord
{
    protected static string $resource = ReviewResource::class;
}
