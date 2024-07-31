<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HistoryWasteResource\Pages;
use App\Filament\Resources\HistoryWasteResource\RelationManagers;
use App\Models\HistoryWaste;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HistoryWasteResource extends Resource
{
    protected static ?string $model = HistoryWaste::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';

    public static function getNavigationSort(): ?int
    {
        return \App\Utilities\FilamentUtility::getNavigationSort(__('History Waste'));
    }

    // public static function getNavigationGroup(): ?string
    // {
    //     return __('Product');
    // }

    public static function getPluralModelLabel(): string
    {
        return __('History Waste');
    }

    public static function getModelLabel(): string
    {
        return __('History Waste');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('waste_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('admin_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('new_price')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('old_price')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('waste.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('admin.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('new_price')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('old_price')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageHistoryWastes::route('/'),
        ];
    }
}
