<?php

declare(strict_types=1);

namespace Mortezaa97\Reviews\Filament\Resources\Reviews\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Mortezaa97\Reviews\Filament\Resources\Reviews\ReviewResource;

class ListReviews extends ListRecords
{
    protected static string $resource = ReviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
