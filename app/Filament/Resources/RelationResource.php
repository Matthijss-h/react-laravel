<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RelationResource\Pages\CreateRelation;
use App\Filament\Resources\RelationResource\Pages\EditRelation;
use App\Filament\Resources\RelationResource\Pages\ListRelations;
use App\Models\Relation;
use BackedEnum;
use UnitEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RelationResource extends Resource
{
    protected static ?string $model = Relation::class;

    protected static string | BackedEnum | null $navigationIcon = Heroicon::OutlinedArrowsRightLeft;

    protected static string | UnitEnum | null $navigationGroup = 'Netwerk';

    protected static ?int $navigationSort = 20;

    protected static ?string $modelLabel = 'Relatie';

    protected static ?string $pluralModelLabel = 'Relaties';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('from_participant_id')
                    ->label('Van deelnemer')
                    ->relationship('fromParticipant', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('to_participant_id')
                    ->label('Naar deelnemer')
                    ->relationship('toParticipant', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('relation_type_id')
                    ->label('Relatietype')
                    ->relationship('type', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Textarea::make('description')
                    ->label('Omschrijving')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('fromParticipant.name')
                    ->label('Van')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('toParticipant.name')
                    ->label('Naar')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('type.name')
                    ->label('Type')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('description')
                    ->label('Omschrijving')
                    ->limit(60)
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Bijgewerkt')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListRelations::route('/'),
            'create' => CreateRelation::route('/create'),
            'edit' => EditRelation::route('/{record}/edit'),
        ];
    }
}
