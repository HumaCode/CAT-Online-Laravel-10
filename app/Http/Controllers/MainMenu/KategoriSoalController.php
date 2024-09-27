<?php

namespace App\Http\Controllers\MainMenu;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainMenu\KategoriSoalRequest;
use App\Models\MainMenu\KategoriSoal;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KategoriSoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.main_menu.kategori_soal');
    }

    public function getData()
    {
        $this->authorize('read main-menu/kategori-soal');

        $konfig_kategori_soal    = 'main-menu/kategori-soal';
        $kategoriSoal            = KategoriSoal::orderBy('id', 'DESC')->get();


        return DataTables::of($kategoriSoal)
            ->addColumn('action', function ($row) use ($konfig_kategori_soal) {

                $routes = [
                    // 'detail' => route('main-menu.sesi-soal.show', $row->id),
                    'edit' => route('main-menu.kategori-soal.edit', $row->id),
                    'hapus' => route('main-menu.kategori-soal.destroy', $row->id)
                ];

                $actions = $this->generateButtons($konfig_kategori_soal, $routes);

                return '<center>' . $actions . '</center>';
            })
            ->addColumn('kategori', function ($row) {
                return $row->kategori_soal;
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'kategori'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.main_menu.kategori_soal_form', [
            'action'    => route('main-menu.kategori-soal.store'),
            'data'      => new KategoriSoal(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KategoriSoalRequest $request, KategoriSoal $kategoriSoal)
    {
        $request->fillData($kategoriSoal);
        $kategoriSoal->save();

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
    public function edit(KategoriSoal $kategoriSoal)
    {
        return view('pages.main_menu.kategori_soal_form', [
            'action'    => route('main-menu.kategori-soal.update', $kategoriSoal->id),
            'data'      => $kategoriSoal,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KategoriSoalRequest $request, KategoriSoal $kategoriSoal)
    {
        $request->fillData($kategoriSoal);
        $kategoriSoal->save();

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KategoriSoal $kategoriSoal)
    {
        $kategoriSoal->delete();

        return responseSuccessDelete();
    }
}
