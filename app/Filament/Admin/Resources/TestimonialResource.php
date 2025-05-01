<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\TestimonialResource\Pages\CreateTestimonial;
use App\Filament\Admin\Resources\TestimonialResource\Pages\EditTestimonial;
use App\Filament\Admin\Resources\TestimonialResource\Pages\ListTestimonials;
use App\Filament\Admin\Resources\TestimonialResource\Pages\ViewTestimonial;
use App\Models\Testimonial;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use IbrahimBougaoua\FilamentRatingStar\Actions\RatingStar;
use IbrahimBougaoua\FilamentRatingStar\Actions\RatingStarColumn;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center-text';

    public static function getModelLabel(): string
    {
        return __('Testimonials');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Grid::make()
                    ->schema([


                        Forms\Components\Grid::make()
                            ->schema([

                                Forms\Components\TextInput::make('full_name')
                                    ->label('Nom et Prénom')
                                    ->required()
                                    ->maxLength(255),

                                RatingStar::make('rating')
                                    ->label('Notation'),

                                Forms\Components\RichEditor::make('message')
                                    ->required()
                                    ->maxLength(65535)
                                    ->columnSpanFull(),

                            ]),

                    ])
                    ->columns(1)
                    ->columnSpan(2),
                Forms\Components\Grid::make()
                    ->schema([
                        Forms\Components\Section::make()
                            ->schema([
                                Forms\Components\FileUpload::make('avatar')
                                    ->image()
                                    ->required(),
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
                Tables\Columns\ImageColumn::make('avatar')
                    ->circular()
                    ->stacked(),

                Tables\Columns\TextColumn::make('full_name')
                    ->label('Nom et Prénom')
                    ->searchable(),

                // RatingStarColumn::make('rating'),

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
            'index' => ListTestimonials::route('/'),
            'create' => CreateTestimonial::route('/create'),
            'view' => ViewTestimonial::route('/{record}'),
            'edit' => EditTestimonial::route('/{record}/edit'),
        ];
    }
}
