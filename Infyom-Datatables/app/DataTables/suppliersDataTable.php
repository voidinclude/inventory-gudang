<?php

namespace App\DataTables;

use App\Models\suppliers;
use Form;
use Yajra\Datatables\Services\DataTable;

class suppliersDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'suppliers.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $suppliers = suppliers::query();

        return $this->applyScopes($suppliers);
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
            'supplierCode' => ['name' => 'supplierCode', 'data' => 'supplierCode'],
            'supplierName' => ['name' => 'supplierName', 'data' => 'supplierName'],
            'address' => ['name' => 'address', 'data' => 'address'],
            'city' => ['name' => 'city', 'data' => 'city'],
            'phone' => ['name' => 'phone', 'data' => 'phone'],
            'fax' => ['name' => 'fax', 'data' => 'fax'],
            'contactPerson' => ['name' => 'contactPerson', 'data' => 'contactPerson'],
            'email' => ['name' => 'email', 'data' => 'email'],
            'createdDate' => ['name' => 'createdDate', 'data' => 'createdDate'],
            'createdUserID' => ['name' => 'createdUserID', 'data' => 'createdUserID'],
            'modifiedDate' => ['name' => 'modifiedDate', 'data' => 'modifiedDate'],
            'modifiedUserID' => ['name' => 'modifiedUserID', 'data' => 'modifiedUserID']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'suppliers';
    }
}
