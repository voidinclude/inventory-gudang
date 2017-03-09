<?php

namespace App\DataTables;

use App\Models\salesinvoices;
use Form;
use Yajra\Datatables\Services\DataTable;

class salesinvoicesDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'salesinvoices.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $salesinvoices = salesinvoices::query();

        return $this->applyScopes($salesinvoices);
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
            ->addAction(['width' => '15%'])
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
                             'pdf',
                         ],
                    ]
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
            'Invoice' => ['name' => 'invoiceNo', 'data' => 'invoiceNo'],
            'Tanggal Invoice' => ['name' => 'invoiceDate', 'data' => 'invoiceDate'],
            'Customer' => ['name' => 'customerName', 'data' => 'customerName'],
            'Total Faktur' => ['name' => 'total', 'data' => 'total'],
            'Dibayar' => ['name' => 'amountPaid', 'data' => 'amountPaid'],
            'Status' => ['name' => 'statusText', 'data' => 'statusText'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'salesinvoices';
    }
}
