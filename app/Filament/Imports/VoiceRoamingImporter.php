<?php

namespace App\Filament\Imports;

use App\Models\Roaming;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class VoiceRoamingImporter extends Importer
{
    protected static ?string $model = Roaming::class;

    public static function getColumns(): array
    {
        return [

            ImportColumn::make('country_name')
            ->requiredMapping()
            ->rules(['required', 'max:255']),

            ImportColumn::make('country_code')
                ->requiredMapping()
                ->rules(['required', 'max:255']),

            ImportColumn::make('incoming_rate')
                ->numeric()
                ->rules(['integer']),

            ImportColumn::make('outgoingtolocal_rate')
                ->numeric()
                ->rules(['integer']),

            ImportColumn::make('outgoingtohomecountry_rate')
                ->numeric()
                ->rules(['integer']),

            ImportColumn::make('outgoingtorestoftheworld_rate')
                ->numeric()
                ->rules(['integer'])
        ];
    }

    public function resolveRecord(): ?Roaming
    {
        if ($this->options['updateExisting'] ?? false) {

            return Roaming::where('type',Roaming::TYPE_DATA)->firstOrNew([

                'country_code' => $this->data['country_code'],
                'country_name' => $this->data['country_name'],

                'incoming_rate' => $this->data['incoming_rate'],
                'outgoingtolocal_rate' => $this->data['outgoingtolocal_rate'],
                'outgoingtohomecountry_rate' => $this->data['outgoingtohomecountry_rate'],
                'outgoingtorestoftheworld_rate' => $this->data['outgoingtorestoftheworld_rate'],

                'type' => $this->options['type']
            ]);
        }

        return new Roaming([
            'country_code' => $this->data['country_code'],
            'country_name' => $this->data['country_name'],
            'data_rate' => $this->data['data_rate'],

            'incoming_rate' => $this->data['incoming_rate'],
            'outgoingtolocal_rate' => $this->data['outgoingtolocal_rate'],
            'outgoingtohomecountry_rate' => $this->data['outgoingtohomecountry_rate'],
            'outgoingtorestoftheworld_rate' => $this->data['outgoingtorestoftheworld_rate'],
            
            'type' => $this->options['type']
        ]);
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your voice roaming import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
