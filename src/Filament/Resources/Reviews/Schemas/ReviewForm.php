<?php

declare(strict_types=1);

namespace Mortezaa97\Reviews\Filament\Resources\Reviews\Schemas;

use Filament\Schemas\Schema;

class ReviewForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            \Filament\Schemas\Components\Group::make()
                ->schema([
                    \Filament\Schemas\Components\Section::make()
                        ->schema([
                            \App\Filament\Components\Form\ModelTypeSelect::create()->required(),
                            \Filament\Forms\Components\TextInput::make('model_id')->required()->maxLength(26),
                            \App\Filament\Components\Form\DescTextarea::create()->required(),
                            \App\Filament\Components\Form\RateTextInput::create()->required(),
                            \App\Filament\Components\Form\IsFeaturedToggle::create()->required(),
                            \App\Filament\Components\Form\NegativePointsTagsInput::create(),
                            \App\Filament\Components\Form\PositivePointsTagsInput::create(),
                            \App\Filament\Components\Form\CreatedBySelect::create()->required(),
                            \App\Filament\Components\Form\UpdatedBySelect::create(),

                        ])
                        ->columns(12)
                        ->columnSpan(12),
                ])
                ->columns(12)
                ->columnSpan(8),
            \Filament\Schemas\Components\Group::make()
                ->schema([
                    \Filament\Schemas\Components\Section::make()
                        ->schema([])
                        ->columns(12)
                        ->columnSpan(12),
                ])
                ->columns(12)
                ->columnSpan(4),
        ])
            ->columns(12);
    }
}
