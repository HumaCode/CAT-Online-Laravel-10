<?php

namespace App\Http\Controllers\Konfigurasi;

use App\DataTables\Konfigurasi\UserDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Konfigurasi\UserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UserDataTable $userDataTable)
    {
        return $userDataTable->render('pages.konfigurasi.user');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.konfigurasi.user-form', [
            'action'    => route('konfigurasi.users.store'),
            'data'      => new User(),
            'roles'     => Role::get()->pluck('name'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request, User $user)
    {
        DB::beginTransaction();
        try {
            $user->fill($request->only(['name', 'email', 'username']));
            $user->password = bcrypt($request->password);

            $user->save();
            $user->assignRole($request->roles);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return responseError($th);
        }

        return responseSuccess();
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
        return view('pages.konfigurasi.user-form', [
            'action'    => route('konfigurasi.users.update', $user->id),
            'data'      => $user,
            'roles'     => Role::get()->pluck('name'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {

        DB::beginTransaction();
        try {
            $user->fill($request->only(['name', 'email', 'username']));
            $user->password = bcrypt($request->password);

            $user->save();
            $user->syncRoles($request->roles);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return responseError($th);
        }

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
