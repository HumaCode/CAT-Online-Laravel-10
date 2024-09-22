<?php

namespace App\Http\Controllers\MainMenu;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainMenu\KategoriUjianRequest;
use App\Models\MainMenu\KategoriUjian;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KategoriUjianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.main_menu.kategori_ujian');
    }

    public function getData()
    {
        $this->authorize('read main-menu/kategori-ujian');

        $konfig_kategori_ujian    = 'main-menu/kategori-ujian';
        $kategoriUjian            = KategoriUjian::orderBy('id', 'DESC')->get();


        return DataTables::of($kategoriUjian)
            ->addColumn('action', function ($row) use ($konfig_kategori_ujian) {

                $routes = [
                    // 'detail' => route('main-menu.sesi-ujian.show', $row->id),
                    'edit' => route('main-menu.kategori-ujian.edit', $row->id),
                    'hapus' => route('main-menu.kategori-ujian.destroy', $row->id)
                ];

                $actions = $this->generateButtons($konfig_kategori_ujian, $routes);

                return '<center>' . $actions . '</center>';
            })
            ->addColumn('kategori', function ($row) {
                return $row->kategori;
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
        return view('pages.main_menu.kategori_ujian_form', [
            'action'    => route('main-menu.kategori-ujian.store'),
            'data'      => new KategoriUjian(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KategoriUjianRequest $request, KategoriUjian $kategoriUjian)
    {
        $request->fillData($kategoriUjian);
        $kategoriUjian->save();

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
    public function edit(KategoriUjian $kategoriUjian)
    {
        return view('pages.main_menu.kategori_ujian_form', [
            'action'    => route('main-menu.kategori-ujian.update', $kategoriUjian->id),
            'data'      => $kategoriUjian,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KategoriUjianRequest $request, KategoriUjian $kategoriUjian)
    {
        $request->fillData($kategoriUjian);
        $kategoriUjian->save();

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KategoriUjian $kategoriUjian)
    {
        $kategoriUjian->delete();

        return responseSuccessDelete();
    }
}
