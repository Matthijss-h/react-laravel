<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ParticipantResource\Pages\CreateParticipant;
use App\Filament\Resources\ParticipantResource\Pages\EditParticipant;
use App\Filament\Resources\ParticipantResource\Pages\ListParticipants;
use App\Models\Participant;
use BackedEnum;
use UnitEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ParticipantResource extends Resource
{
    protected static ?string $model = Participant::class;

    protected static string | BackedEnum | null $navigationIcon = Heroicon::OutlinedUsers;

    protected static string | UnitEnum | null $navigationGroup = 'Netwerk';

    protected static ?int $navigationSort = 10;

    protected static ?string $modelLabel = 'Deelnemer';

    protected static ?string $pluralModelLabel = 'Deelnemers';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Naam')
                    ->required()
                    ->maxLength(255),
                Select::make('participant_type_id')
                    ->label('Type')
                    ->relationship('type', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('layer_id')
                    ->label('Laag')
                    ->relationship('layer', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Textarea::make('short_description')
                    ->label('Korte omschrijving')
                    ->columnSpanFull(),
                TextInput::make('website')
                    ->label('Website')
                    ->url()
                    ->maxLength(255),
                TextInput::make('email')
                    ->label('E-mail')
                    ->email()
                    ->maxLength(255),
                TextInput::make('phone')
                    ->label('Telefoon')
                    ->tel()
                    ->maxLength(255),
                Toggle::make('is_active')
                    ->label('Actief')
                    ->default(true),
                Select::make('themes')
                    ->label('Thema’s')
                    ->relationship('themes', 'name')
                    ->multiple()
                    ->preload(),
                Select::make('projects')
                    ->label('Projecten')
                    ->relationship('projects', 'name')
                    ->multiple()
                    ->preload(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Naam')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('type.name')
                    ->label('Type')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('layer.name')
                    ->label('Laag')
                    ->searchable()
                    ->sortable(),
                IconColumn::make('is_active')
                    ->label('Actief')
                    ->boolean(),
                TextColumn::make('email')
                    ->label('E-mail')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('phone')
                    ->label('Telefoon')
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
            'index' => ListParticipants::route('/'),
            'create' => CreateParticipant::route('/create'),
            'edit' => EditParticipant::route('/{record}/edit'),
        ];
    }
}
