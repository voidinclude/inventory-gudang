<?php

namespace App\DataTables;

use App\Models\salesorders;
use Form;
use Yajra\Datatables\Services\DataTable;
use DB;
use Auth;

class salesordersDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'salesorders.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $salesorders = salesorders::query();
        /*$salesorders = DB::table('salesorders')
            ->select('soNo', 'customerName', 'DATE_FORMAT("orderDate, %d-%m-%Y")', 'DATE_FORMAT("needDate, %d-%m-%Y")')
            ->get();*/
        return $this->applyScopes($salesorders);
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
            ->addAction(['width' => '20%'])
            ->ajax('')
            ->parameters([
                'dom' => 'Bfrtip',
                'scrollX' => false,
                'buttons' => [
                    // 'reset',
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
            'Pemesanan' => ['name' => 'soNo', 'data' => 'soNo'],
            'Customer' => ['name' => 'customerName', 'data' => 'customerName'],
            'Tanggal Pesan' => ['name' => 'orderDate', 'data' => 'orderDate'],
            'Tanggal Dibutuhkan' => ['name' => 'needDate', 'data' => 'needDate'],
            'Status' => ['name' => 'statusText', 'data' => 'statusText']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'salesorders';
    }
}
