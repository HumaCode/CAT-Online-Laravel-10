<?php

namespace App\Http\Controllers\MainMenu;

use App\Http\Controllers\Controller;
use App\Models\MainMenu\DetailSoal;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DetailSoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($kode_soal)
    {
        return view('pages.main_menu.question_detail', compact('kode_soal'));
    }

    public function getData($kode_soal)
    {
        $this->authorize('read main-menu/data-soal');

        $konfig_data_soal           = 'main-menu/data-soal';
        $detailSoal                 = DetailSoal::where('question_id', $kode_soal)->orderBy('id', 'DESC')->get();


        return DataTables::of($detailSoal)
            ->addColumn('action', function ($row) use ($konfig_data_soal) {

                $routes = [
                    'detail' => route('main-menu.detail-soal.show', ['id' => $row->id, 'kode_soal' => $row->kode_soal]),
                    'edit' => route('main-menu.detail-soal.edit', ['id' => $row->id, 'kode_soal' => $row->kode_soal]),
                    'hapus' => route('main-menu.detail-soal.destroy', ['id' => $row->id, 'kode_soal' => $row->kode_soal])
                ];

                $actions = $this->generateButtons($konfig_data_soal, $routes);

                return '<center>' . $actions . '</center>';
            })
            ->addColumn('image', function ($row) {
                return $row->image;
            })
            ->addColumn('question', function ($row) {
                return $row->question;
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'image', 'question'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($kode_soal)
    {
        return view('pages.main_menu.question_detail_create', compact('kode_soal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
