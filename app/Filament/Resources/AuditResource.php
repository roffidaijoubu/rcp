<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AuditResource\Pages;
use App\Filament\Resources\AuditResource\RelationManagers;
use App\Models\Audit;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Text;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;

use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AuditResource extends Resource
{
    protected static ?string $model = Audit::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // hide from menu for now
    protected static bool $shouldRegisterNavigation = true;

    protected static $areaOptions = [
        'SOR1' => [
            'BATAM' => 'BATAM',
            'DUMAI' => 'DUMAI',
            'LAMPUNG' => 'LAMPUNG',
            'MEDAN' => 'MEDAN',
            'PALEMBANG' => 'PALEMBANG',
            'PEKANBARU' => 'PEKANBARU',
        ],
        'SOR2' => [
            'BEKASI' => 'BEKASI',
            'BOGOR' => 'BOGOR',
            'CILEGON' => 'CILEGON',
            'CIREBON' => 'CIREBON',
            'JAKARTA' => 'JAKARTA',
            'KARAWANG' => 'KARAWANG',
            'TANGERANG' => 'TANGERANG',
        ],
        'SOR3' => [
            'PASURUAN' => 'PASURUAN',
            'SEMARANG' => 'SEMARANG',
            'SIDOARJO' => 'SIDOARJO',
            'SURABAYA' => 'SURABAYA',
        ],
        'SSWJ' => [
            'AOJBB' => 'AOJBB',
            'AOL' => 'AOL',
            'AOSS' => 'AOSS',
        ]
    ];

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // TextArea::make('name')
                //     ->required()
                //     ->maxLength(255),
                Forms\Components\TextInput::make('year')
                    ->required()
                    ->numeric()
                    ->default(date('Y'))
                    ->maxLength(255),
                Select::make('template')
                    ->required()
                    // ->disabled()
                    ->options([
                        'iso-55001-2014' => 'ISO 55001:2014',
                        // 'template2' => 'Template 2',
                    ])
                    ->default('iso-55001-2014'),
                Select::make('satker')
                    ->required()
                    ->options([
                        'SOR1' => 'SOR1',
                        'SOR2' => 'SOR2',
                        'SOR3' => 'SOR3',
                        'SSWJ' => 'SSWJ'
                    ])
                    ->reactive(),

                Select::make('area')
                    ->required()
                    ->options(
                        function (callable $get) {
                            $satker = $get('satker');
                            if (!$satker) {
                                return [];
                            }
                            return self::$areaOptions[$satker];
                        }
                    ),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                // Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('year')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('template')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('area')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('satker')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('user.name')->label('Author')->searchable()->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    // Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListAudits::route('/'),
            'create' => Pages\CreateAudit::route('/create'),
            'view' => Pages\ViewAudit::route('/{record}'),
            'edit' => Pages\EditAudit::route('/{record}/edit'),
        ];
    }
}
