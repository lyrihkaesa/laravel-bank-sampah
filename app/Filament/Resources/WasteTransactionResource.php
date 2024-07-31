<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WasteTransactionResource\Pages;
use App\Filament\Resources\WasteTransactionResource\RelationManagers;
use App\Models\WasteTransaction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WasteTransactionResource extends Resource
{
    protected static ?string $model = WasteTransaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationSort(): ?int
    {
        return \App\Utilities\FilamentUtility::getNavigationSort(__('Waste Transaction'));
    }

    // public static function getNavigationGroup(): ?string
    // {
    //     return __('Product');
    // }

    public static function getPluralModelLabel(): string
    {
        return __('Waste Transaction');
    }

    public static function getModelLabel(): string
    {
        return __('Waste Transaction');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Main')
                    ->schema([
                        Forms\Components\Select::make('user_id')
                            ->label('User')
                            ->relationship('user', 'name')
                            ->required()
                            ->searchable()
                            ->disabled(auth()->user()->role === \App\Enums\UserRole::WARGA)
                            ->default(auth()->id()),
                        Forms\Components\Select::make('admin_id')
                            ->label('Validator')
                            ->relationship('admin', 'name')
                            ->disabled(),
                        Forms\Components\DateTimePicker::make('verified_at')
                            ->label(__('Verified At'))
                            ->disabled(),
                    ])
                    ->columns(3),
                Forms\Components\Section::make('Details')
                    ->collapsible()
                    ->schema([
                        Forms\Components\TextInput::make('total_waste_price')
                            ->numeric()
                            ->disabled(),
                        Forms\Components\TextInput::make('total_organic_price')
                            ->numeric()
                            ->disabled(),
                        Forms\Components\TextInput::make('total_inorganic_price')
                            ->numeric()
                            ->disabled(),
                        Forms\Components\TextInput::make('total_waste_weight')
                            ->numeric()
                            ->disabled(),
                        Forms\Components\TextInput::make('total_organic_weight')
                            ->numeric()
                            ->disabled(),
                        Forms\Components\TextInput::make('total_inorganic_weight')
                            ->numeric()
                            ->disabled(),
                    ])
                    ->columns(3)
                    ->hidden(fn (string $operation) => $operation === 'create'),
                Forms\Components\Repeater::make('wasteTransactionItems')
                    ->label(__('Waste'))
                    ->relationship('wasteTransactionItems')
                    ->schema([
                        Forms\Components\Select::make('waste_id')
                            ->label(__('Waste'))
                            ->relationship('waste', 'name')
                            ->required()
                            ->searchable()
                            ->preload(),
                        Forms\Components\TextInput::make('price')
                            ->label(__('Price'))
                            ->prefix('Rp')
                            ->numeric()
                            ->required()
                            ->minValue(0)
                            ->default(0),
                        Forms\Components\TextInput::make('weight')
                            ->label(__('Weight'))
                            ->suffix('Kg')
                            ->numeric()
                            ->required()
                            ->minValue(0)
                            ->default(0),
                    ])
                    ->columns(3)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label(__('User Name'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('admin.name')
                    ->label(__('Validator'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_waste_price')
                    ->label(__('Total Price'))
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('total_organic_price')
                    ->label(__('Total Organic Price'))
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('total_inorganic_price')
                    ->label(__('Total Inorganic Price'))
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('total_waste_weight')
                    ->label(__('Total Weight'))
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('total_organic_weight')
                    ->label(__('Total Organic Weight'))
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('total_inorganic_weight')
                    ->label(__('Total Inorganic Weight'))
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('verified_at')
                    ->label(__('Verified At'))
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('Created At'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__('Updated At'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('updated_at', 'desc');
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
            'index' => Pages\ListWasteTransactions::route('/'),
            'create' => Pages\CreateWasteTransaction::route('/create'),
            'view' => Pages\ViewWasteTransaction::route('/{record}'),
            'edit' => Pages\EditWasteTransaction::route('/{record}/edit'),
        ];
    }
}
