<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\NewsletterEmailResource\Pages\CreateNewsletterEmail;
use App\Filament\Admin\Resources\NewsletterEmailResource\Pages\EditNewsletterEmail;
use App\Filament\Admin\Resources\NewsletterEmailResource\Pages\ListNewsletterEmails;
use App\Filament\Admin\Resources\NewsletterEmailResource\Pages\ViewNewsletterEmail;
use App\Models\NewsletterEmail;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class NewsletterEmailResource extends Resource
{
    protected static ?string $model = NewsletterEmail::class;

    protected static ?string $navigationIcon = 'heroicon-o-at-symbol';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make()
                    ->schema([

                        Forms\Components\Section::make()
                            ->schema([
                                Forms\Components\Select::make('user_id')
                                    ->label('utilisateur')
                                    ->relationship('user', 'name')
                                    ->required(),

                                Forms\Components\TextInput::make('email_address')
                                    ->label('E-mail')
                                    ->email()
                                    ->required()
                                    ->maxLength(255),
                            ]),

                    ])->columns(1)
                    ->columnSpan(2),
                Forms\Components\Section::make('Autorisations')
                    ->schema([


                        Forms\Components\Toggle::make('is_enabled')
                            ->label('Autorisé')
                            ->required()
                            ->default(true),
                    ])->columns(1)
                    ->columnSpan(1),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                ->label('utilisateur')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('email_address')
                ->label('E-mail')
                    ->searchable(),

                Tables\Columns\IconColumn::make('is_enabled')
                    ->label('Autorisé')
                    ->boolean(),

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
            'index' => ListNewsletterEmails::route('/'),
            'create' => CreateNewsletterEmail::route('/create'),
            'view' => ViewNewsletterEmail::route('/{record}'),
            'edit' => EditNewsletterEmail::route('/{record}/edit'),
        ];
    }
}
