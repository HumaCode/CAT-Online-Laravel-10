<?php

namespace App\Http\Controllers\MainMenu;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainMenu\ListSoalRequest;
use App\Models\MainMenu\KategoriUjian;
use App\Models\MainMenu\ListSoal;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.main_menu.question');
    }

    public function getData()
    {
        $this->authorize('read main-menu/data-soal');

        $konfig_data_soal       = 'main-menu/data-soal';
        $dataSoal               = ListSoal::with('kategoriUjian')->orderBy('id', 'DESC')->get();


        return DataTables::of($dataSoal)
            ->addColumn('action', function ($row) use ($konfig_data_soal) {

                $routes = [
                    'tmbh'  => route('main-menu.data-soal.show', $row->id),
                    'edit'  => route('main-menu.data-soal.edit', $row->id),
                    'hapus' => route('main-menu.data-soal.destroy', $row->id)
                ];

                $actions = $this->generateButtons($konfig_data_soal, $routes);

                return '<center>' . $actions . '</center>';
            })
            ->addColumn('kode_soal', function ($row) {
                return $row->kode_soal;
            })
            ->addColumn('type', function ($row) {
                $typ = $row->type;

                return '<center>' . $typ . '</center>';
            })
            ->addColumn('kategori', function ($row) {

                $kat = $row->kategoriUjian->kategori;

                return '<center>' . $kat . '</center>';
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'kode_soal', 'type', 'kategori'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.main_menu.question_form', [
            'action'    => route('main-menu.data-soal.store'),
            'kat'       => KategoriUjian::pluck('kategori', 'id')->toArray(),
            'data'      => new ListSoal(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ListSoalRequest $request, ListSoal $listSoal)
    {
        $request->fillData($listSoal);
        $listSoal->kode_soal = 'UJIAN' . now()->format('YmdHis');
        $listSoal->save();

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
    public function edit($id,)
    {
        return view('pages.main_menu.question_form', [
            'action'    => route('main-menu.data-soal.update', $id),
            'kat'       => KategoriUjian::pluck('kategori', 'id')->toArray(),
            'data'      => ListSoal::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ListSoalRequest $request, $id)
    {
        $soal = ListSoal::find($id);

        $request->fillData($soal);
        $soal->save();

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        ListSoal::find($id)->delete();


        return responseSuccessDelete();
    }
}
