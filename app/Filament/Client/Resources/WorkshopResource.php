<?php

namespace App\Filament\Client\Resources;

use App\Filament\Client\Resources\WorkshopResource\Pages\Lesson;
use Filament\Forms;
use Filament\Tables;
use App\Models\Workshop;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Enums\CategoryTypeEnums;
use App\Enums\WorshopsTypeEnums;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use App\Enums\WorshopsDureeEnums;
use Filament\Infolists\Components;
use Illuminate\Support\Facades\Auth;
use App\Filament\Client\Resources\WorkshopResource\Pages\ViewWorkshop;
use App\Filament\Client\Resources\WorkshopResource\RelationManagers\PaymentsRelationManager;


class WorkshopResource extends Resource
{
    protected static ?string $model = Workshop::class;

    public static function getEloquentQuery(): Builder
    {
        return Workshop::query()
            ->whereHas('users', function ($query){
                $query->where('user_id', auth()->id());
            });
    }

    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\SpatieMediaLibraryImageColumn::make('image')
                    ->circular()
                    ->stacked(),

                Tables\Columns\TextColumn::make('name')
                    ->label('Titre')
                    ->searchable(),

                Tables\Columns\TextColumn::make('duree')
                    ->label('duree')
                    ->badge()
                    ->searchable(),

                Tables\Columns\TextColumn::make('category.name')
                    ->label('catégorie')
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


    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Components\Section::make()
                    ->schema([
                        Components\Split::make([
                            Components\Grid::make(2)
                                ->schema([
                                    Components\Group::make([
                                        Components\TextEntry::make('price')
                                            ->inlineLabel(),

                                        Components\TextEntry::make('duree')
                                            ->label('Durée')
                                            ->inlineLabel()
                                            ->badge(),

                                        Components\TextEntry::make('effectif')
                                            ->inlineLabel(),
                                    ]),

                                    Components\Group::make([
                                        Components\TextEntry::make('category.name')
                                            ->label('Catégorie')
                                            ->inlineLabel(),

                                        Components\TextEntry::make('description')
                                            ->inlineLabel(),

                                        Components\TextEntry::make('publish_date')
                                            ->label('Publié le')
                                            ->inlineLabel()
                                            ->badge()
                                            ->date()
                                            ->color('success'),

                                    ]),

                                    Components\Group::make([
                                        Components\TextEntry::make('content')
                                            ->prose()
                                            ->markdown()
                                            ->label('Détails'),
                                    ]),

                                ]),
                        ])->from('lg'),
                        Components\SpatieMediaLibraryImageEntry::make('images')
                            ->hiddenLabel()
                            ->grow(false),

                    ]),

                Components\RepeatableEntry::make('lessons')
                    ->schema([
                    Components\ImageEntry::make('featured_image')
                        ->hiddenLabel()
                        ->columnSpanFull(),
                    Components\TextEntry::make('title')
                        ->size('lg')
                        ->hintAction(
                            Components\Actions\Action::make('open')
                                ->label("Ouvrir la lesson")
                                ->url(fn (Model $record): string => Lesson::getUrl(['lesson' => $record->slug]), true)
                                ->icon('heroicon-o-arrow-up-right')
                        ),
                    Components\TextEntry::make('short_description'),
                ])
            ]);
    }


    public static function getRelations(): array
    {
        return [
            // PaymentsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Client\Resources\WorkshopResource\Pages\ListWorkshops::route('/'),
            'view' => ViewWorkshop::route('/{record}'),
            'lesson' => Lesson::route('/lessons/{lesson:slug}'),
        ];
    }
}
