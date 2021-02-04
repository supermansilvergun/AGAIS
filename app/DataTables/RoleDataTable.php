<?php

namespace App\DataTables;

use App\Models\Role;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class RoleDataTable extends DataTable
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
            ->addColumn('action', function($role){
                $btn = '
                    <div class="btn-group">
                        <a href="'.route('roles.edit', $role).'" type="button" class="btn btn-primary btn-edit" title="'.__('Edit').'"><i class="fa fa-edit"></i></a>
                        <a href="'.route('roles.show', $role).'" type="button" class="btn btn-primary btn-show" data-toggle="modal" data-target="#modal-show"  title="'.__('Details').'"><i class="fa fa-eye"></i></a>
                        <a href="'.route('roles.destroy', $role).'"  type="button" class="btn btn-primary btn-delete" title="'.__('Delete').'"><i class="fa fa-trash"></i></a>
                    </div>';
                return $btn;
            })
            ->addColumn('select', function($role){
                $checkbox = '<input type="checkbox" class="sub_check" data-route="'.route('roles.purge', $role->id).'" data-id="'.$role->id.'">';
                return $checkbox;
            })
            ->addColumn('status', function($role){
                    if($role->deleted_at != ''){
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
            ->rawColumns(['action', 'select', 'status']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Role $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Role $model)
    {
        return $model->newQuery()->orderBy('created_at', 'DESC');
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
                                "reload"    => "Recargar",
                                "reset"     => "Cargar",
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
                        ->footer(__('Name')),
            Column::make('code')
                        ->title(__('Code'))
                        ->footer(__('Code')),
            Column::make('display_name')
                        ->title(__('Display Name'))
                        ->footer(__('Display Name')),
            Column::computed('status')
                            ->title(__('Status'))
                            ->footer(__('Status'))
                            ->exportable(true)
                            ->printable(true)
                            ->orderable(true)
                            ->width('10%'),
            Column::computed('action')
                        ->title(__('Action'))
                        ->footer(__('Action'))
                        ->exportable(false)
                        ->printable(false)
                        ->width(110)
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
        return 'Role_' . date('YmdHis');
    }
}
