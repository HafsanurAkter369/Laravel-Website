<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        // Product pictures are saved inside public/images
        config([
            'filesystems.disks.product_images' => [
                'driver' => 'local',
                'root' => public_path('images'),
                'url' => '/images',
                'visibility' => 'public',
                'throw' => false,
            ],
        ]);

        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('category')
                    ->required()
                    ->default('General'),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('৳'),
                FileUpload::make('image')
                    ->image()
                    ->disk('product_images')
                    ->visibility('public')
                    ->maxSize(2048),
                TextInput::make('stock')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}