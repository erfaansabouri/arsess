<?php

namespace App\Filament\Resources\ProductResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class ProductPurchaseConditionsRelationManager extends RelationManager {
    protected static string  $relationship         = 'productPurchaseConditions';
    protected static ?string $recordTitleAttribute = 'id';
    protected static ?string $label                = 'شرایط خرید محصول';
    protected static ?string $pluralLabel          = 'شرایط خرید محصول';
    protected static ?string $title                = 'شرایط خرید محصول';

    public function form ( Form $form ): Form {
        return $form->schema([
                                 Forms\Components\TextInput::make('title')
                                                           ->required()
                                                           ->maxLength(255)
                                                           ->label('عنوان') ,
                             ]);
    }

    public function table ( Table $table ): Table {
        return $table->recordTitleAttribute('title')
                     ->columns([
                                   Tables\Columns\TextColumn::make('title')
                                                            ->label('عنوان') ,
                               ])
                     ->filters([//
                               ])
                     ->headerActions([
                                         Tables\Actions\CreateAction::make() ,
                                     ])
                     ->actions([
                                   Tables\Actions\EditAction::make() ,
                                   Tables\Actions\DeleteAction::make() ,
                               ])
                     ->bulkActions([
                                       Tables\Actions\BulkActionGroup::make([
                                                                                Tables\Actions\DeleteBulkAction::make() ,
                                                                            ]) ,
                                   ]);
    }
}
