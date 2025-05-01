<?php

namespace App\Filament\Admin\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Get;
use App\Models\Workshop;
use Filament\Forms\Form;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Enums\CategoryTypeEnums;
use App\Enums\WorshopsTypeEnums;
use Filament\Resources\Resource;
use App\Enums\WorshopsDureeEnums;
use App\Filament\Admin\Resources\WorkshopResource\Pages\EditWorkshop;
use App\Filament\Admin\Resources\WorkshopResource\Pages\ViewWorkshop;
use App\Filament\Admin\Resources\WorkshopResource\Pages\ListWorkshops;
use App\Filament\Admin\Resources\WorkshopResource\Pages\CreateWorkshop;
use App\Filament\Client\Resources\WorkshopResource\RelationManagers\PaymentsRelationManager;
use Filament\Tables\Columns\ImageColumn;
class WorkshopResource extends Resource
{
    protected static ?string $model = Workshop::class;

    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';

    protected static ?string $navigationGroup = 'Order Online';

    public static function getModelLabel(): string
    {
        return __('Products');
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make()
                    ->schema([
                        Forms\Components\Grid::make()
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label('Title')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(
                                        function (string $operation, string $state, Forms\Set $set, ) {
                                            if ($operation === 'edit') {
                                                return;
                                            }
                                            $set('slug', Str::slug($state));
                                        }
                                    ),

                                Forms\Components\TextInput::make('slug')
                                    ->label('slug')
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(ignoreRecord: true)
                                    ->readOnly(),
                            ]),

                        Forms\Components\Grid::make()
                            ->schema([
                                Forms\Components\TextInput::make('price')
                                    ->required()
                                    ->numeric()
                                    ->prefix('$'),

                                Forms\Components\TextInput::make('old_price')
                                    ->numeric()
                                    ->prefix('$'),
                            ]),


                        Forms\Components\TextInput::make('ingredient')
                            ->required()
                            ->label('Ingredient')
                            ->maxLength(255),

                        Forms\Components\RichEditor::make('content')
                            ->required()
                            ->columnSpanFull(),
                    ])
                    ->columns(1)
                    ->columnSpan(2),

                Forms\Components\Grid::make()
                    ->schema([
                        Forms\Components\Section::make()
                            ->schema([
                                Forms\Components\Toggle::make('is_published')
                                    ->label('Is published')
                                    ->default(true)
                                    ->required(),

                                Forms\Components\DateTimePicker::make('publish_date')
                                    ->label('Publish date')
                                    ->default(now()),

                                    Forms\Components\FileUpload::make('image')
                                    ->label('Image')
                                    ->image()
                                    ->directory('workshops') // Chemin de stockage dans public/storage/workshops
                                    ->disk('public')
                                    ->visibility('public')
                                    ->preserveFilenames()
                                    ->required(), // ou ->nullable() si pas obligatoire
                            ]),


                        Forms\Components\Section::make()
                            ->schema([
                                Forms\Components\Select::make('category_item_id')
                                    ->label('catégorie')
                                    ->relationship('category', 'name')
                                    ->native(false)
                                    ->searchable()
                                    ->required()
                                    ->preload()
                                    ->createOptionForm([
                                        Forms\Components\FileUpload::make('image')
                                        ->image()
                                        ->disk('public')
                                        ->directory('workshop')
                                        ->required(),
                                            Forms\Components\Grid::make()
                                            ->schema([
                                                Forms\Components\TextInput::make('name')
                                                    ->label('Titre')
                                                    ->required()
                                                    ->maxLength(255)
                                                    ->live(onBlur: true)
                                                    ->afterStateUpdated(
                                                        function (string $operation, string $state, Forms\Set $set, ) {
                                                            if ($operation === 'edit') {
                                                                return;
                                                            }
                                                            $set('slug', Str::slug($state));
                                                        }
                                                    ),
                            
                                                Forms\Components\TextInput::make('slug')
                                                    ->label('slug')
                                                    ->required()
                                                    ->maxLength(255)
                                                    ->unique(ignoreRecord: true)
                                                    ->readOnly(),
                                            ]),
                            
                                        Forms\Components\Toggle::make('is_enabled')
                                            ->required()
                                            ->default(true),
                                        ]),

                            ]),

                    ])
                    ->columns(1)
                    ->columnSpan(1),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
             

                ImageColumn::make('image')
                    ->label('Image')
                    ->getStateUsing(fn ($record) => asset('storage/' . $record->image))
                    ->height(80)
                    ->width(80)
                    ->circular(), // optionnel : arrondi
                
            
            

                Tables\Columns\TextColumn::make('name')
                    ->label('Titre')
                    ->searchable(),

                Tables\Columns\TextColumn::make('slug')
                    ->label('slug')
                    ->searchable(),

                Tables\Columns\TextColumn::make('category.name')
                    ->label('Category')
                    ->sortable(),

                Tables\Columns\TextColumn::make('price')
                    ->label('Price')
                    ->money()
                    ->sortable(),

                Tables\Columns\TextColumn::make('old_price')
                    ->label('Old price')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('ingredient')
                    ->searchable(),

                Tables\Columns\IconColumn::make('is_published')
                    ->label('Status')
                    ->boolean(),

                Tables\Columns\TextColumn::make('publish_date')
                    ->label('Publié le')
                    ->dateTime('Y-m-d H:i')
                    ->sortable(),


                Tables\Columns\TextColumn::make('created_at')
                    ->label('Créé le')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Modifié le')
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
            'index' => ListWorkshops::route('/'),
            'create' => CreateWorkshop::route('/create'),
            'view' => ViewWorkshop::route('/{record}'),
            'edit' => EditWorkshop::route('/{record}/edit'),
        ];
    }
}
