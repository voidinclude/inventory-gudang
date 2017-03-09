<?php

namespace App\DataTables;

use App\Models\factories;
use Form;
use Yajra\Datatables\Services\DataTable;

class factoriesDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'factories.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $factories = factories::query();

        return $this->applyScopes($factories);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->addAction(['width' => '10%'])
            ->ajax('')
            ->parameters([
                'dom' => 'Bfrtip',
                'scrollX' => false,
                'buttons' => [
                    // 'print',
                    'reset',
                    'reload',
                    [
                         'extend'  => 'collection',
                         'text'    => '<i class="fa fa-download"></i> Export',
                         'buttons' => [
                             'csv',
                             'excel',
                             // 'pdf',
                         ],
                    ],
                    'colvis'
                ]
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    private function getColumns()
    {
        return [
            'KODE GUDANG' => ['name' => 'factoryCode', 'data' => 'factoryCode'],
            'NAMA GUDANG' => ['name' => 'factoryName', 'data' => 'factoryName'],
            'TIPE' => ['name' => 'factoryType', 'data' => 'factoryType'],
            'STATUS' => ['name' => 'status', 'data' => 'status']
            // 'note' => ['name' => 'note', 'data' => 'note'],
            // 'createdDate' => ['name' => 'createdDate', 'data' => 'createdDate'],
            // 'createdUserID' => ['name' => 'createdUserID', 'data' => 'createdUserID'],
            // 'modifiedDate' => ['name' => 'modifiedDate', 'data' => 'modifiedDate'],
            // 'modifiedUserID' => ['name' => 'modifiedUserID', 'data' => 'modifiedUserID']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'factories';
    }
}
