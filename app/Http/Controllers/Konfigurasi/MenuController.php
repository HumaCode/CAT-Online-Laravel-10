<?php

namespace App\Http\Controllers\Konfigurasi;

use App\DataTables\Konfigurasi\MenuDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Konfigurasi\MenuRequest;
use App\Models\Konfigurasi\Menu;
use App\Models\Permission;
use App\Repositories\MenuRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Mavinoo\Batch\BatchFacade;

class MenuController extends Controller
{
    public function __construct(private MenuRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(MenuDataTable $menuDataTable)
    {
        return $menuDataTable->render('pages.konfigurasi.menu');
    }

    public function sort()
    {
        $menus = $this->repository->getMenus();

        $data = [];
        $i = 0;
        foreach ($menus as $mm) {
            $i++;
            $data[] = ['id' => $mm->id, 'orders' => $i];
            foreach ($mm->subMenus as $sm) {
                $i++;
                $data[] = ['id' => $sm->id, 'orders' => $i];
            }
        }

        Cache::forget('menus');

        BatchFacade::update(new Menu(), $data, 'id');
        responseSuccess(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Menu $menu)
    {
        $this->authorize('create konfigurasi/menu');

        return view('pages.konfigurasi.menu-form', [
            'action'    => route('konfigurasi.menu.store'),
            'data'      => $menu,
            'mainMenus' => $this->repository->getMainMenus(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuRequest $request, Menu $menu)
    {
        $this->authorize('create konfigurasi/menu');

        DB::beginTransaction();
        try {
            $request->fillData($menu);
            $menu->save();

            foreach ($request->permissions ?? [] as $permission) {
                Permission::create(['name' => $permission . " $menu->url"])->menus()->attach($menu);
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return responseError($th);
        }

        Cache::forget('menus');
        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        $this->authorize('update konfigurasi/menu');

        return view('pages.konfigurasi.menu-form', [
            'action'    => route('konfigurasi.menu.update', $menu->id),
            'data'      => $menu,
            'mainMenus' => $this->repository->getMainMenus(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MenuRequest $request, Menu $menu)
    {
        $this->authorize('update konfigurasi/menu');

        $request->fillData($menu);

        if ($request->level_menu == 'main_menu') {
            $menu->main_menu_id = null;
        }
        $menu->save();

        Cache::forget('menus');

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        //
    }
}
