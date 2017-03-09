<?php

namespace App\DataTables;

use App\Models\salesorderitem;
use Form;
use Yajra\Datatables\Services\DataTable;

class salesorderitemDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'salesorderitems.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $salesorderitems = salesorderitem::query();

        return $this->applyScopes($salesorderitems);
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
            'soID' => ['name' => 'soID', 'data' => 'soID'],
            'productID' => ['name' => 'productID', 'data' => 'productID'],
            'productName' => ['name' => 'productName', 'data' => 'productName'],
            'sku' => ['name' => 'sku', 'data' => 'sku'],
            'price' => ['name' => 'price', 'data' => 'price'],
            'qty' => ['name' => 'qty', 'data' => 'qty'],
            'note' => ['name' => 'note', 'data' => 'note'],
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
        return 'salesorderitems';
    }
}
