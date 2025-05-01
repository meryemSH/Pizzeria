<?php

namespace App\Filament\Admin\Resources;

use App\Enums\orderStutsEnums;
use App\Filament\Admin\Resources\OrderResource\Pages\CreateOrder;
use App\Filament\Admin\Resources\OrderResource\Pages\EditOrder;
use App\Filament\Admin\Resources\OrderResource\Pages\ListOrders;
use App\Filament\Admin\Resources\OrderResource\Pages\ViewOrder;
use App\Models\Order;
use App\Models\Workshop;
use Filament\Forms;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $navigationGroup = "Commandes";

    public static function getModelLabel(): string
    {
        return __('Orders');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Grid::make()
                    ->schema([

                        Forms\Components\Grid::make()
                            ->schema([
                                Forms\Components\TextInput::make('amount')
                                    ->required()
                                    ->numeric(),

                                Forms\Components\Select::make('status')
                                    ->native(false)
                                    ->searchable()
                                    ->required()
                                    ->options(orderStutsEnums::toSelectArray()),
                            ]),

                        Forms\Components\Select::make('payment_method_id')
                        ->label('Mode de paiements')
                        ->relationship('paymentMethod', 'name')
                        ->native(false)
                        ->searchable()
                        ->required()
                        ->preload()
                        ->createOptionForm([
                            Forms\Components\TextInput::make('name')
                                ->label('Name')
                                ->required()
                                ->maxLength(255),
                        ]),

                        Forms\Components\Select::make('user_id')
                        ->label('Nom d\'utilisateur')
                        ->relationship('user', 'name')
                        ->native(false)
                        ->searchable()
                        ->required()
                        ->preload(),

                        Forms\Components\TextInput::make('shipping_address')
                        ->required(),

                        Forms\Components\RichEditor::make('notes')
                            ->maxLength(65535)
                            ->columnSpanFull(),
                    ]),

                    Forms\Components\Section::make('Order items')

                    ->schema([
                        static::getItemsRepeater(),
                    ]),
            ])->columns(3);
    }


    public static function getItemsRepeater(): Repeater
    {
        return Repeater::make('items')
            ->relationship()
            ->schema([

                Forms\Components\Select::make('workshop_id')
                ->label('Nom d\'atelier')
                ->options(Workshop::query()->pluck('name', 'id'))
                ->required()
                ->reactive()
                ->afterStateUpdated(fn ($state, Forms\Set $set) => $set('unit_price_amount', Workshop::find($state)?->price ?? 0 ) && $set('name', Workshop::find($state)?->name ?? '') )
                ->distinct()
                ->disableOptionsWhenSelectedInSiblingRepeaterItems()
                ->columnSpan([
                    'md' => 3,
                ])
                ->searchable(),

                Forms\Components\TextInput::make('quantity')
                ->label('Quantity')
                ->numeric()
                ->default(1)
                ->columnSpan([
                    'md' => 3,
                ])
                ->required(),

                Forms\Components\TextInput::make('name')
                ->extraInputAttributes(['readonly' => true])
                ->label('Nom')
                ->columnSpan([
                    'md' => 3,
                ])
                ->required(),


                Forms\Components\TextInput::make('unit_price_amount')
                    ->label('Prix unitaire')
                    ->extraInputAttributes(['readonly' => true])
                    ->numeric()
                    ->required()
                    ->dehydrated()
                    ->columnSpan([
                        'md' => 3,
                    ]),
            ])
            ->extraItemActions([
                Action::make('openProduct')
                    ->tooltip('Open product')
                    ->icon('heroicon-m-arrow-top-right-on-square')

                    ->hidden(fn (array $arguments, Repeater $component): bool => blank($component->getRawItemState($arguments['item'])['workshop_id'])),
            ])

            ->defaultItems(1)
            ->hiddenLabel()
            ->columns([
                'md' => 10,
            ])
            ->required();
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                ->label('Utilisateur')
                ->numeric()
                ->sortable(),

                Tables\Columns\TextColumn::make('amount')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable()
                    ->badge(),

                Tables\Columns\TextColumn::make('PaymentMethod.name')
                    ->label('Mode de paiements')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
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
            'index' => ListOrders::route('/'),
            'create' => CreateOrder::route('/create'),
            'view' => ViewOrder::route('/{record}'),
            'edit' => EditOrder::route('/{record}/edit'),
        ];
    }
}
