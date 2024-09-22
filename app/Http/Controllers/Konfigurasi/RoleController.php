<?php

namespace App\Http\Controllers\Konfigurasi;

use App\DataTables\Konfigurasi\RoleDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Konfigurasi\RoleRequest;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(RoleDataTable $roleDataTable)
    {
        return $roleDataTable->render('pages.konfigurasi.role');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.konfigurasi.role-form', [
            'action'    => route('konfigurasi.roles.store'),
            'data'      => new Role(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request, Role $role)
    {
        $request->fillData($role);
        $role->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return view('pages.konfigurasi.role-form', [
            'data'      => $role,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('pages.konfigurasi.role-form', [
            'action'    => route('konfigurasi.roles.update', $role->id),
            'data'      => $role,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, Role $role)
    {
        $request->fillData($role);
        $role->save();

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return responseSuccessDelete();
    }
}
