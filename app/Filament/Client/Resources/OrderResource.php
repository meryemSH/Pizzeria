<?php

namespace App\Filament\Client\Resources;

use App\Models\Order as ModelsOrder;
use Filament\Forms\Form;
use Filament\Infolists\Components;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;


class OrderResource extends Resource
{
    protected static ?string $model = ModelsOrder::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    public static function getModelLabel(): string
    {
        return __('Commande');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function getItemsRepeater()
    {
        return RepeatableEntry::make('items')
            ->schema([
                TextEntry::make('workshop.name')->label('Nom d\'atelier'),
                TextEntry::make('name')->label('produit'),
                TextEntry::make('quantity')->label('Quantité'),
                TextEntry::make('unit_price_amount')->label('Montant du prix unitaire'),
            ]);
    }




    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Components\Grid::make(2)
                    ->schema([
                        Components\Section::make('Commande')
                            ->schema([
                                Components\Split::make([
                                    Components\Grid::make(1)
                                        ->schema([
                                            Components\Group::make([
                                                Components\TextEntry::make('user.name')
                                                    ->label('Utilisateur'),

                                                Components\TextEntry::make('amount')
                                                    ->label('Prix'),

                                                Components\TextEntry::make('paymentMethod.name')
                                                    ->label('Mode de paiement'),

                                                Components\TextEntry::make('shipping_address')
                                                    ->label('adresse de livraison'),

                                                Components\TextEntry::make('status')
                                                    ->label('status')
                                                    ->badge(),
                                            ])->columns(3),

                                        ])


                                ])->from('md'),
                            ]),

                            Components\Section::make('Produits commandés')->schema([
                                Components\RepeatableEntry::make('items')->schema([
                                    // Définir les champs à afficher pour chaque article de commande.
                                    Components\Textentry::make('workshop.name')->label('Nom d\'atelier'),
                                    Components\Textentry::make('name')->label('Produit'),
                                    Components\Textentry::make('quantity')->label('Quantité'),
                                    Components\Textentry::make('unit_price_amount')->label('Prix unitaire'),
                                ])->columns(4),
                            ]),

                    ]),
                Components\Section::make('notes')
                    ->schema([
                        Components\TextEntry::make('notes')
                            ->prose()
                            ->markdown()
                            ->hiddenLabel(),
                    ])
                    ->collapsible(),
            ]);

    return $infolist;
    }

    public static function table(Table $table): Table
    {
        $user = Auth::user();

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
                    ->searchable(),

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

            ->query(ModelsOrder::where('user_id', $user->id))

            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => \App\Filament\Client\Resources\OrderResource\Pages\Listorders::route('/'),
            'view' => \App\Filament\Client\Resources\OrderResource\Pages\ViewOrder::route('/{record}'),
        ];
    }
}
