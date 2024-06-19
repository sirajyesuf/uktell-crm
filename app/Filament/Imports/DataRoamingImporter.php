<?php

namespace App\Filament\Imports;

use App\Models\Roaming;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;
use Carbon\CarbonInterface;


class DataRoamingImporter extends Importer
{
    protected static ?string $model = Roaming::class;

    public static function getColumns(): array
    {
        return [

            ImportColumn::make('country_code')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('country_name')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('data_rate')
                ->numeric()
                ->rules(['required','integer'])
                ->exampleHeader('Rate (GBP per GB)'),

        ];
    }

    public function resolveRecord(): ?Roaming
    {
        if ($this->options['updateExisting'] ?? false) {

            return Roaming::where('type',Roaming::TYPE_DATA)->firstOrNew([
                'country_code' => $this->data['country_code'],
                'country_name' => $this->data['country_name'],
                'data_rate' => $this->data['data_rate'],
                'type' => $this->options['type']
            ]);
        }

        return new Roaming([
            'country_code' => $this->data['country_code'],
            'country_name' => $this->data['country_name'],
            'data_rate' => $this->data['data_rate'],
            'type' => $this->options['type']
        ]);
        
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your data roaming import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
