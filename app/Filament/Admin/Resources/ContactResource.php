<?php

namespace App\Filament\Admin\Resources;

use App\Enums\ContactStatusEnums;
use App\Filament\Admin\Resources\ContactResource\Pages\CreateContact;
use App\Filament\Admin\Resources\ContactResource\Pages\EditContact;
use App\Filament\Admin\Resources\ContactResource\Pages\ListContacts;
use App\Filament\Admin\Resources\ContactResource\Pages\ViewContact;
use App\Models\Contact;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox-arrow-down';

    public static function getModelLabel(): string
    {
        return __('Contact');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('full_name')
                    ->label('Nom et Prénom')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->label('téléphone')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('age')
                    ->label('Age d\'enfant')
                    ->numeric()
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('objet')
                    ->label('Object')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Select::make('status')
                    ->native(false)
                    ->searchable()
                    ->required()
                    ->options(ContactStatusEnums::toSelectArray()),

                Forms\Components\RichEditor::make('message')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('full_name')
                    ->label('Nom et Prénom')
                    ->searchable(),

                Tables\Columns\TextColumn::make('phone')
                    ->label('téléphone')
                    ->searchable(),

                Tables\Columns\TextColumn::make('email')
                    ->label('E-mail')
                    ->searchable(),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->searchable(),

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
            'index' => ListContacts::route('/'),
            'create' => CreateContact::route('/create'),
            'view' => ViewContact::route('/{record}'),
            'edit' => EditContact::route('/{record}/edit'),
        ];
    }
}
