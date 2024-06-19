<?php

namespace App\Filament\Imports;

use App\Models\InternationalRate;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class VoiceInternationalRateImporter extends Importer
{
    protected static ?string $model = InternationalRate::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('country_name')
            ->requiredMapping()
            ->rules(['required', 'max:255']),

            ImportColumn::make('country_code')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            
            ImportColumn::make('rate')
                ->requiredMapping()
                ->numeric()
                ->rules(['required', 'integer'])
        ];
    }

    public function resolveRecord(): ?InternationalRate
    {
        if ($this->options['updateExisting'] ?? false) {

            return InternationalRate::where('type',InternationalRate::TYPE_VOICE)->firstOrNew([

                'country_code' => $this->data['country_code'],
                'country_name' => $this->data['country_name'],
                'rate' => $this->data['rate'],

                'type' => $this->options['type']
            ]);
        }

        return new InternationalRate([

            'country_code' => $this->data['country_code'],
            'country_name' => $this->data['country_name'],
            'rate' => $this->data['rate'],

            'type' => $this->options['type']
        ]);
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your international rate import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
