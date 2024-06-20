<?php

namespace App\Filament\Imports;

use App\Models\Roaming;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class RoamingImporter extends Importer
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
                ->rules(['integer']),
            ImportColumn::make('data_rate')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('type')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
        ];
    }

    public function resolveRecord(): ?Roaming
    {
        // return Roaming::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Roaming();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your roaming import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
