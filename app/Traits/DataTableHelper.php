<?php

namespace App\Traits;

use Yajra\DataTables\Html\Column;

trait DataTableHelper
{
    public function setHtml($tableName)
    {
        return $this->builder()
            ->parameters([
                'searchDelay' => 1000,
                'responsive' => [
                    'details' => [
                        'display' => '$.fn.dataTable.Responsive.display.childRowImmediate'
                    ]
                ],
            ])
            ->setTableId($tableName)
            ->columns($this->getColumns())
            ->minifiedAjax()
            // ->dom('Bfrtip)
            ->orderBy(1);
    }

    public function setColumns(array $columns)
    {
        return [
            Column::make('DT_RowIndex')->title('#')->searchable(false)->orderable(false),
            Column::make('id')->hidden(),
            ...$columns,
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(100)
                ->addClass('text-center'),
        ];
    }

    public function basicActions($row)
    {
        $actions = [];

        $actions['Detail'] = route(str_replace('/', '.', request()->path()) . '.show', $row->id);
        if (user()->can('update ' . request()->path())) {
            $actions['Edit'] = route(str_replace('/', '.', request()->path()) . '.edit', $row->id);
        }

        if (user()->can('delete ' . request()->path())) {
            $actions['Delete'] = route(str_replace('/', '.', request()->path()) . '.destroy', $row->id);
        }

        return $actions;
    }

    public static function generateButtons($path, $routes)
    {

        if (isset($routes['tmbh'])) {
            $detail = user()->can('create ' . $path) && !empty($routes['tmbh']) ?
                '<a href="' . $routes['tmbh'] . '" class="btn btn-outline-secondary btn-border btn-sm card-animate" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Soal"><i class="mdi mdi-plus"></i></a>'
                : '';
        } else {
            $detail = user()->can('read ' . $path) && !empty($routes['detail']) ?
                '<a href="' . $routes['detail'] . '" class="btn btn-outline-secondary btn-border btn-sm action card-animate" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detail"><i class="mdi mdi-eye"></i></a>'
                : '';
        }

        $edit = user()->can('update ' . $path) && !empty($routes['edit']) ?
            '<a href="' . $routes['edit'] . '" class="btn btn-outline-success btn-border btn-sm action card-animate" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i class="mdi mdi-grease-pencil"></i></a>'
            : '';

        $hapus = user()->can('delete ' . $path) && !empty($routes['hapus']) ?
            '<a href="' . $routes['hapus'] . '" class="btn btn-outline-danger btn-border btn-sm delete card-animate" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus"><i class="mdi mdi-trash-can-outline"></i></a>'
            : '';

        return trim($detail . ' ' . $edit . ' ' . $hapus);
    }
}
