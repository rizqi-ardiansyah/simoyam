<?php

namespace App\Http\Controllers;

use App\Models\Kandang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;

class KandangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kandang = Kandang::select('kandang.id as idUser','kandang.idPerusahaan','tglMasuk','noKandang','asalPeternak','jnsAyam',
        'jmlAyam')
            ->leftJoin('perusahaan as pr', 'kandang.idPerusahaan', '=', 'pr.idPerusahaan')
            // ->where('idPerusahaan','P0001')
            // ->orderBy('fullName', 'asc')
            ->paginate(5);

        $roles = Role::all();
        return view('admin.kandang.index', [
            'data' => $kandang,
            'role' => $roles,
        ]);
    }

    public function search()
    {
        $filter = request()->query();
        return User::select(DB::raw("concat(users.firstname,' ',users.lastname) as fullName"), 'users.firstname', 'users.lastname', 'users.email', 'users.id AS idAdmin', 'mr.role_id', 'r.id as idRole', 'r.name as namaPeran')
            ->leftJoin('model_has_roles as mr', 'users.id', '=', 'mr.model_id')
            ->leftJoin('roles AS r', 'mr.role_id', '=', 'r.id')
            ->where('users.firstname', 'LIKE', "%{$filter['search']}%")
            ->orWhere('users.lastname', 'LIKE', "%{$filter['search']}%")
            ->orWhere('users.email', 'LIKE', "%{$filter['search']}%")
            ->orderBy('fullName', 'asc')
            ->get();
    }

    public function create(Request $request)
    {
        if (auth()->user()->hasAnyRole(['admin'])) {
            $request->validate([
                // 'tanggal' => ['required', 'max:50'],
                'asal' => ['required', 'max:50'],
                'jenis' => ['required', 'max:50'],
                'jml' => ['required', 'max:50'],
            ]);

            $addAyam = new Kandang;
            // $role = Role::findOrFail($request->peran);
            $addAyam->idPerusahaan = $request->idPerusahaan;
            $addAyam->noKandang = $request->noKandang;
            $addAyam->tglMasuk = $request->tgl;
            $addAyam->jnsAyam = $request->jenis;
            $addAyam->asalPeternak = $request->asal;
            $addAyam->jmlAyam = $request->jml;

            // $addMember->email_verified_at = now();
            // $addMember->password = Hash::make('password');
            // $addMember->remember_token = Str::random(10);
            $addAyam->save();
            // $addMember->assignRole($role);
            Alert::success('Success', 'Data berhasil ditambahkan');
            return back();
        }
        return back();
    }

    public function edit(Request $request, $id)
    {

        // $role = Role::where('id', $request->peran)->first();
        $kandang = Kandang::where('id', $id)->first();

        if (auth()->user()->hasAnyRole(['admin'])) {
            // $addAyam->idPerusahaan = $request->idPerusahaan;
            $kandang->noKandang = $request->noKandang;
            $kandang->tglMasuk = $request->tgl;
            $kandang->jnsAyam = $request->jenis;
            $kandang->asalPeternak = $request->asal;
            $kandang->jmlAyam = $request->jml;
            $kandang->update();
            // $member->syncRoles($role);
            Alert::success('Success', 'Data berhasil diubah');
            return redirect()->back();
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(User $user)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if (auth()->user()->hasAnyRole(['admin'])) {
            $delete = Kandang::destroy($id);

            // check data deleted or not
            if ($delete == 1) {
                $success = true;
                $message = "Data berhasil dihapus";
            } else {
                $success = true;
                $message = "Data gagal dihapus";
            }

            //  return response
            return response()->json([
                'success' => $success,
                'message' => $message,
            ]);
        }
        return back();
    }
}
