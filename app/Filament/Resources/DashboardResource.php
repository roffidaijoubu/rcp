<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DashboardResource\Pages;
use App\Filament\Resources\DashboardResource\RelationManagers;
use App\Models\Dashboard;
use Filament\Forms;
use Filament\Forms\Get;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Guava\FilamentIconPicker\Forms\IconPicker;
use Guava\FilamentIconPicker\Tables\IconColumn;



class DashboardResource extends Resource
{
    protected static ?string $model = Dashboard::class;

    protected static ?string $navigationIcon = 'ri-dashboard-fill';

    // protected static ?string $navigationGroup = 'Dashboard';

    protected static ?int $navigationSort = 1;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                ->required(),
                IconPicker::make('icon')
                ->required(),

                Forms\Components\Select::make('category')
                ->options([
                    'General' => 'General',
                    'Cost' => 'Cost',
                    'Risk' => 'Risk',
                    'Performance' => 'Performance',
                ])
                ->required(),
                Forms\Components\Checkbox::make('is_custom_page')
                    ->default(false)
                    ->live(),
                Forms\Components\TextInput::make('workbook_name')
                    ->hidden(fn (Get $get): bool => $get('is_custom_page'))
                    ->required(fn (Get $get): bool => ! $get('is_custom_page')),
                Forms\Components\TextInput::make('view_name')
                    ->hidden(fn (Get $get): bool => $get('is_custom_page'))
                    ->required(fn (Get $get): bool => ! $get('is_custom_page')),
                Forms\Components\TextInput::make('site_name')
                    ->hidden(fn (Get $get): bool => $get('is_custom_page')),
                Forms\Components\TextInput::make('custom_page')
                    ->hidden(fn (Get $get): bool => ! $get('is_custom_page'))
                    ->required(fn (Get $get): bool =>  $get('is_custom_page')),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Tables\Columns\TextColumn::make('created_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
                // Tables\Columns\TextColumn::make('updated_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
                // IconColumn::make('icon'),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                // Tables\Columns\TextColumn::make('workbook_name')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('view_name')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('site_name')
                //     ->searchable(),
                Tables\Columns\TextColumn::make('category')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->paginated(false)
            ->defaultSort('order_column', 'asc')
            ->reorderable('order_column');
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
            'index' => Pages\ListDashboards::route('/'),
            'create' => Pages\CreateDashboard::route('/create'),
            'edit' => Pages\EditDashboard::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
