<?php

namespace App\Filament\Clusters\Settings\Resources\GeneralResource\Pages;

use App\Filament\Clusters\Settings\Resources\GeneralResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists;
use Filament\Infolists\Infolist;

class ViewGeneral extends ViewRecord
{
    protected static string $resource = GeneralResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }


    public  function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\TextEntry::make('data_rate'),
                Infolists\Components\TextEntry::make('voice_rate'),
                Infolists\Components\TextEntry::make('sms_rate')
                    ->columnSpanFull(),
            ]);
    }
}
