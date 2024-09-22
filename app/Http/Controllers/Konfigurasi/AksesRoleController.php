<?php

namespace App\Http\Controllers\Konfigurasi;

use App\DataTables\Konfigurasi\RoleDataTable;
use App\Http\Controllers\Controller;
use App\Models\Konfigurasi\Menu;
use App\Models\Role;
use App\Repositories\MenuRepository;
use Illuminate\Http\Request;

class AksesRoleController extends Controller
{
    public function __construct(private MenuRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(RoleDataTable $roleDataTable)
    {
        return $roleDataTable->render('pages.konfigurasi.akses-role');
    }

    public function getPermissionByRole(Role $role)
    {
        return view('pages.konfigurasi.akses-role-items', [
            'data'      => $role,
            'menus'     => $this->repository->getMainMenuWithPermission(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $roles  = Role::where('id', '!=', $role->id)->get()->pluck('id', 'name');

        return view('pages.konfigurasi.akses-role-form', [
            'action'    => route('konfigurasi.akses-role.update', $role->id),
            'data'      => $role,
            'menus'     => $this->repository->getMainMenuWithPermission(),
            'roles'     => $roles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $role->syncPermissions($request->permissions);

        return responseSuccess(true);
    }
}
