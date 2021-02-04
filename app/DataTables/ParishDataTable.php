<?php

namespace App\DataTables;

use App\Models\Parish;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ParishDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function($parish){
                $btn = '
                    <div class="btn-group">
                        <a href="'.route('parishes.edit', $parish).'" type="button" class="btn btn-primary btn-edit" title="'.__('Edit').'"><i class="fa fa-edit"></i></a>
                        <a href="'.route('parishes.show', $parish).'" type="button" class="btn btn-primary btn-show" data-toggle="modal" data-target="#modal-show"  title="'.__('Details').'"><i class="fa fa-eye"></i></a>
                        <a href="'.route('parishes.destroy', $parish).'" type="button" class="btn btn-primary btn-delete" title="'.__('Delete').'"><i class="fa fa-trash"></i></a>
                    </div>';
                return $btn;
            })
            ->addColumn('select', function($parish){
                $checkbox = '<input type="checkbox" class="sub_check" data-route="'.route('parishes.purge', $parish->id).'" data-id="'.$parish->id.'">';
                return $checkbox;
            })
            ->addColumn('status', function($parish){
                if($parish->deleted_at != ''){
                    $status = '
                    <span>
                        <i class="fa fa-ban fa-lg text-danger"></i>
                    </span>';
                    return $status;
                }else{
                    $status = '
                    <span>
                        <i class="far fa-check-circle fa-lg text-success"></i>
                    </span>';
                    return $status;
                }
            })
            ->addColumn('municipality', function($parish){
                $municipality = $parish->municipality->name;
                return $municipality;
            })
            ->addColumn('state', function($parish){
                $state = $parish->municipality->state->name;
                return $state;
            })
            ->addColumn('country', function($parish){
                $country = $parish->municipality->state->country->name;
                return $country;
            })
            ->rawColumns(['action', 'select', 'status', 'municipality', 'state', 'country' ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Parish $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Parish $model)
    {
        return $model->newQuery()->with('municipality')->orderBy('created_at', 'DESC');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('dataTable')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->parameters([
                        'responsive' => true,
                        'language' => [
                            'url' => '//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json',
                            "buttons"           => [
                                "copy"      => "Copiar",
                                "colvis"    => "Visibilidad",
                                "create"    => "Crear",
                                "export"    => "Exportar",
                                "reset"     => "Recargar",
                                "print"     => "Imprimir"
                            ]
                        ],
                    ])
                    ->buttons(
                            Button::make('')
                                    ->text('<i class="fa fa-plus"></i> Crear')
                                    ->addClass('btn btn-create'),
                            Button::make('')
                                    ->text('<i class="fa fa-trash"></i> Eliminar')
                                    ->addClass('btn btn-delete-all'),
                            Button::make('export'),
                            Button::make('print'),
                            Button::make('reset'),
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::computed('select')
                    ->title('<input type="checkbox" id="check-master">')
                    ->exportable(false)
                    ->printable(false)
                    ->orderable(false)
                    ->width('5%'),
            Column::make('name')
                    ->title(__('Name'))
                    ->footer(__('Name'))
                    ->with('15%'),
            Column::make('code')
                    ->title(__('Code'))
                    ->footer(__('Code'))
                    ->with('10%'),
            Column::computed('municipality')
                    ->title(__('Municipality'))
                    ->footer(__('Municipality'))
                    ->exportable(true)
                    ->printable(true)
                    ->orderable(true)
                    ->searchable(true)
                    ->width('15%'),
            Column::computed('state')
                    ->title(__('State'))
                    ->footer(__('State'))
                    ->exportable(true)
                    ->printable(true)
                    ->orderable(true)
                    ->searchable(true)
                    ->width('15%'),
            Column::computed('country')
                    ->title(__('Country'))
                    ->footer(__('Country'))
                    ->exportable(true)
                    ->printable(true)
                    ->orderable(true)
                    ->searchable(true)
                    ->width('15%'),
            Column::computed('status')
                    ->title(__('Status'))
                    ->footer(__('Status'))
                    ->exportable(true)
                    ->printable(true)
                    ->orderable(true)
                    ->width('5%'),
            Column::computed('action')
                    ->title(__('Action'))
                    ->footer(__('Action'))
                    ->exportable(false)
                    ->printable(false)
                    ->width('15%')
                    ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Parish_' . date('YmdHis');
    }
}
