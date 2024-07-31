<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function getNavigationSort(): ?int
    {
        return \App\Utilities\FilamentUtility::getNavigationSort(__('User'));
    }

    // public static function getNavigationGroup(): ?string
    // {
    //     return __('Product');
    // }

    public static function getPluralModelLabel(): string
    {
        return __('User');
    }

    public static function getModelLabel(): string
    {
        return __('User');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make(__('Personal Information'))
                    ->schema([
                        Forms\Components\FileUpload::make('avatar')
                            ->label(__('Avatar'))
                            ->image()
                            ->avatar()
                            ->directory('avatars')
                            ->columnSpan(1),
                        Forms\Components\Group::make()
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label(__('Name'))
                                    ->required()
                                    ->columnSpanFull(),
                                Forms\Components\ToggleButtons::make('role')
                                    ->label(__('Role'))
                                    ->options(\App\Enums\UserRole::class)
                                    ->inline()
                                    ->required()
                                    ->default(\App\Enums\UserRole::WARGA),
                                Forms\Components\TextInput::make('phone')
                                    ->label(__('Phone'))
                                    ->tel()
                                    ->required(),
                            ])
                            ->columnSpan(2)
                            ->columns(2),
                    ])
                    ->columns(3),
                Forms\Components\Section::make(__('Address Information'))
                    ->schema([
                        Forms\Components\TextInput::make('rt')
                            ->label(__('RT'))
                            ->required()
                            ->columnSpan(1),
                        Forms\Components\TextInput::make('rw')
                            ->label(__('RW'))
                            ->required()
                            ->columnSpan(1),
                        Forms\Components\TextInput::make('village')
                            ->label(__('Village'))
                            ->required()
                            ->columnSpan(2),
                    ])
                    ->columns(4),
                Forms\Components\Section::make(__('Contact and Security Information'))
                    ->schema([
                        Forms\Components\TextInput::make('email')
                            ->label(__('Email'))
                            ->email(),
                        Forms\Components\TextInput::make('password')
                            ->label(__('Password'))
                            ->password()
                            ->revealable()
                            ->helperText(function (string $operation, Forms\Get $get) {
                                if ($operation === 'create') {
                                    return __('Password Helper Text Create');
                                }
                                if ($operation === 'edit') {
                                    return __('Password Helper Text Edit');
                                }
                            }),
                    ])
                    ->columns(2),
                Forms\Components\Section::make(__('Statistic'))
                    ->schema([
                        Forms\Components\TextInput::make('total_balance')
                            ->label(__('Total Balance'))
                            ->disabled()
                            ->numeric(),
                        Forms\Components\TextInput::make('total_waste_weight')
                            ->label(__('Total Waste Weight'))
                            ->disabled()
                            ->numeric(),
                        Forms\Components\TextInput::make('total_organic_weight')
                            ->label(__('Total Organic Weight'))
                            ->disabled()
                            ->numeric(),
                        Forms\Components\TextInput::make('total_inorganic_weight')
                            ->label(__('Total Inorganic Weight'))
                            ->disabled()
                            ->numeric(),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('avatar')
                    ->label(__('Avatar'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->label(__('Name'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label(__('Phone'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('role')
                    ->label(__('Role'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('rt')
                    ->label(__('RT'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('rw')
                    ->label(__('RW'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('village')
                    ->label(__('Village'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('total_balance')
                    ->label(__('Total Balance'))
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
                Tables\Columns\TextColumn::make('total_waste_weight')
                    ->label(__('Total Waste Weight'))
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('email_verified_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
