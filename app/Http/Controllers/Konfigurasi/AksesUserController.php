<?php

namespace App\Http\Controllers\Konfigurasi;

use App\DataTables\Konfigurasi\UserDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\MenuRepository;
use Illuminate\Http\Request;

class AksesUserController extends Controller
{
    public function __construct(private MenuRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(UserDataTable $userDataTable)
    {
        return $userDataTable->render('pages.konfigurasi.akses-user');
    }

    public function getPermissionByUser(User $user)
    {
        return view('pages.konfigurasi.akses-user-items', [
            'data'      => $user,
            'menus'     => $this->repository->getMainMenuWithPermission(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $users  = User::where('id', '!=', $user->id)->get()->pluck('id', 'name');

        return view('pages.konfigurasi.akses-user-form', [
            'action'    => route('konfigurasi.akses-user.update', $user->id),
            'data'      => $user,
            'menus'     => $this->repository->getMainMenuWithPermission(),
            'users'     => $users,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->syncPermissions($request->permissions);

        return responseSuccess(true);
    }
}
