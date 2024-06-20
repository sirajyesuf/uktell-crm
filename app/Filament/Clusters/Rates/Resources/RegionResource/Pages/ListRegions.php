<?php

namespace App\Filament\Clusters\Rates\Resources\RegionResource\Pages;

use App\Filament\Clusters\Rates\Resources\RegionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Forms;
use Filament\Resources\Components\Tab;
use App\Models\InternationalRate;

class ListRegions extends ListRecords
{
    protected static string $resource = RegionResource::class;

    // protected static string $view = 'filament.resources.region-resource.pages.list-regions';
    
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\Action::make('add_zone')
            ->label('Add Region1')
            ->form([
                Forms\Components\TextInput::make('name')

            ])->slideOver()
            
        ];
    }


    public function getTabs(): array
    {
        return [
            'International Voice' => Tab::make()->query(fn ($query) => $query->where('type',InternationalRate::TYPE_VOICE)),
            'International Text' => Tab::make()->query(fn ($query) => $query->where('type',InternationalRate::TYPE_SMS)),
        ];
    }
}
