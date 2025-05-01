<?php

namespace App\Filament\Admin\Resources;

use AmidEsfahani\FilamentTinyEditor\TinyEditor;
use App\Filament\Admin\Resources\BlogResource\Pages\CreateBlog;
use App\Filament\Admin\Resources\BlogResource\Pages\EditBlog;
use App\Filament\Admin\Resources\BlogResource\Pages\ListBlogs;
use App\Filament\Admin\Resources\BlogResource\Pages\ViewBlog;
use App\Models\Blog;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;

    protected static ?string $navigationIcon = 'heroicon-o-document';

    protected static ?string $navigationGroup = 'Blog';

    public static function getModelLabel(): string
    {
        return __('Blog');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make()
                    ->schema([


                        Forms\Components\Grid::make()
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->label('Titre')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(
                                        function (
                                            string $operation,
                                            string $state,
                                            Forms\Set $set,
                                        ) {
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
                                    ->readOnly()
                                    ->disabled(),
                            ]),

                        Forms\Components\TextInput::make('description')
                            ->label('Description courte')
                            ->required()
                            ->maxLength(255),

//                        Forms\Components\RichEditor::make('content')
//                            ->required()
//                            ->columnSpanFull(),

                        TinyEditor::make('content')
                            ->fileAttachmentsDisk('public')
                            ->fileAttachmentsVisibility('public')
                            ->fileAttachmentsDirectory('uploads')
                            ->profile('full')
                            ->columnSpanFull()
                            ->required(),

                    ])->columns(1)
                    ->columnSpan(2),

                Forms\Components\Section::make([
                    Forms\Components\Section::make()
                        ->schema([

                            Forms\Components\FileUpload::make('image')
                                ->image()
                                ->required(),
                            Forms\Components\Toggle::make('is_featured')
                                ->required()
                                ->default(true),
                            Forms\Components\DateTimePicker::make('published_at')
                                ->required()
                                ->default(now()),
                            Forms\Components\Toggle::make('is_published')
                                ->required()
                                ->default(true),


                        ])
                        ->columnSpan(1),

                    Forms\Components\Section::make('category')
                        ->schema([
                            Forms\Components\Select::make('category_blog_id')
                                ->label('catégorie')
                                ->relationship('categoryBlog', 'title')
                                ->native(false)
                                ->searchable()
                                ->required()
                                ->preload()
                        ])
                        ->columnSpan(1),
                ])
                    ->columns(1)
                    ->columnSpan(1),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('image')
                    ->circular()
                    ->stacked(),

                Tables\Columns\TextColumn::make('title')
                    ->label('Titre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),

                Tables\Columns\TextColumn::make('categoryBlog.title')
                ->label('catégorie')
                ->sortable(),

                Tables\Columns\TextColumn::make('description')
                    ->searchable(),

                Tables\Columns\IconColumn::make('is_published')
                    ->label('Status')
                    ->boolean(),
                Tables\Columns\TextColumn::make('published_at')
                    ->label('Publié le')
                    ->dateTime('Y-m-d H:i')
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
            'index' => ListBlogs::route('/'),
            'create' => CreateBlog::route('/create'),
            'view' => ViewBlog::route('/{record}'),
            'edit' => EditBlog::route('/{record}/edit'),
        ];
    }
}
