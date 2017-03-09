<?php

namespace App\DataTables;

use App\Models\salespayments;
use Form;
use Yajra\Datatables\Services\DataTable;

class salespaymentsDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'salespayments.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $salespayments = salespayments::query();

        return $this->applyScopes($salespayments);
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
            'No Pembayaran' => ['name' => 'paymentNo', 'data' => 'paymentNo'],
            'Tgl Pembayaran' => ['name' => 'paymentDate', 'data' => 'paymentDate'],
            'Jenis' => ['name' => 'payType', 'data' => 'payType'],
            'TOTAL' => ['name' => 'total', 'data' => 'total'],
            'Customer' => ['name' => 'customerName', 'data' => 'customerName']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'salespayments';
    }
}
