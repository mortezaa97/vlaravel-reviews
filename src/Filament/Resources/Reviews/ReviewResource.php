<?php

declare(strict_types=1);

namespace Mortezaa97\Reviews\Filament\Resources\Reviews;

use Mortezaa97\Reviews\Filament\Resources\Reviews\Pages\CreateReview;
use Mortezaa97\Reviews\Filament\Resources\Reviews\Pages\EditReview;
use Mortezaa97\Reviews\Filament\Resources\Reviews\Pages\ListReviews;
use Mortezaa97\Reviews\Filament\Resources\Reviews\Schemas\ReviewForm;
use Mortezaa97\Reviews\Filament\Resources\Reviews\Tables\ReviewsTable;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Mortezaa97\Reviews\Models\Review;
use UnitEnum;

class ReviewResource extends Resource
{
    protected static ?string $model = Review::class;

    protected static ?string $navigationLabel = 'نظرات';

    protected static ?string $modelLabel = 'نظر';

    protected static ?string $pluralModelLabel = 'نظرات';

    protected static string|null|UnitEnum $navigationGroup = 'بلاگ';

    public static function form(Schema $schema): Schema
    {
        return ReviewForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ReviewsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListReviews::route('/'),
            'create' => CreateReview::route('/create'),
            'edit' => EditReview::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
