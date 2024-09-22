<?php

namespace App\Http\Controllers\MainMenu;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainMenu\SesiUjianRequest;
use App\Models\MainMenu\SesiUjian;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SesiUjianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.main_menu.sesi_ujian');
    }

    public function getData()
    {
        $this->authorize('read main-menu/sesi-ujian');

        $konfig_sesi    = 'main-menu/sesi-ujian';
        $sesiUjian      = SesiUjian::orderBy('id', 'DESC')->get();


        return DataTables::of($sesiUjian)
            ->addColumn('action', function ($row) use ($konfig_sesi) {

                $routes = [
                    // 'detail' => route('main-menu.sesi-ujian.show', $row->id),
                    'edit' => route('main-menu.sesi-ujian.edit', $row->id),
                    'hapus' => route('main-menu.sesi-ujian.destroy', $row->id)
                ];

                $actions = $this->generateButtons($konfig_sesi, $routes);

                return '<center>' . $actions . '</center>';
            })
            ->addColumn('name', function ($row) {
                return $row->name;
            })
            ->addColumn('time_start', function ($row) {
                $start = substr($row->time_start, 0, 5);

                return '<center>' . $start . '</center>';
            })
            ->addColumn('time_end', function ($row) {

                $end = substr($row->time_end, 0, 5);

                return '<center>' . $end . '</center>';
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'name', 'time_start', 'time_end'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.main_menu.sesi_ujian_form', [
            'action'    => route('main-menu.sesi-ujian.store'),
            'data'      => new SesiUjian(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SesiUjianRequest $request, SesiUjian $sesiUjian)
    {
        $request->fillData($sesiUjian);
        $sesiUjian->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SesiUjian $sesiUjian)
    {
        return view('pages.main_menu.sesi_ujian_form', [
            'action'    => route('main-menu.sesi-ujian.update', $sesiUjian->id),
            'data'      => $sesiUjian,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SesiUjianRequest $request, SesiUjian $sesiUjian)
    {
        $request->fillData($sesiUjian);
        $sesiUjian->save();

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SesiUjian $sesiUjian)
    {
        $sesiUjian->delete();

        return responseSuccessDelete();
    }
}
