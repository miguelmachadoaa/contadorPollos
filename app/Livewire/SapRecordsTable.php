<?php

namespace App\Livewire;

use App\Models\SapRecord;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class SapRecordsTable extends DataTableComponent
{
    protected $model = SapRecord::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
             ->setDefaultSort('created_at', 'desc');
    }

    public function columns(): array
    {
        return [
            Column::make('Sociedad', 'sociedad')->sortable()->searchable(),
            Column::make('Ejercicio', 'ejercicio')->sortable()->searchable(),
            Column::make('Ticket', 'ticket')->sortable()->searchable(),
            Column::make('Placa', 'placa')->sortable()->searchable(),
            Column::make('Transportista', 'transportista')->searchable(),
            Column::make('Chofer', 'chofer')->searchable(),
            Column::make('Procedencia', 'procedencia')->searchable(),
            Column::make('Lote', 'num_lote')->sortable(),
            Column::make('Aves', 'cant_aves')->sortable(),
            Column::make('Muertas', 'aves_muertas'),
            Column::make('Faltantes', 'aves_faltantes'),
            Column::make('Descartadas', 'aves_descartadas'),
            ButtonGroupColumn::make('Acciones',)
                ->attributes(function ($row) {
                    return [
                        'class' => 'space-x-2',
                    ];
                })
                ->buttons([
                    LinkColumn::make('My Link 1')
                        ->title(fn($row) => __('Ver Detalles'))
                        ->location(fn($row) => url('admin/sap/'.$row->id))
                         ->attributes(function ($row) {
                            return [
                                'class' => 'btn btn-sm btn-outline-primary',
                            ];
                        }),
                ]
            ),

        ];
    }
}
