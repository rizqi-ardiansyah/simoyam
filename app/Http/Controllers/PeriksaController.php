<?php

namespace App\Http\Controllers;

use App\Models\Periksa;
use App\Models\Kandang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class PeriksaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periksa = Periksa::select('periksa.id as idPeriksa','periksa.idPerusahaan','kd.id as idKandang',
        'kd.noKandang','tglPeriksa','mati','culling','bobot','pakan')
            ->leftJoin('perusahaan as pr', 'periksa.idPerusahaan', '=', 'pr.idPerusahaan')
            ->leftJoin('kandang as kd','periksa.idKandang','=','kd.id')
            // ->where('idPerusahaan','P0001')
            // ->orderBy('fullName', 'asc')
            ->paginate(5);

        $kandang = Kandang::all();

        $roles = Role::all();
        return view('admin.periksa.index', [
            'kandang' => $kandang,
            'data' => $periksa,
            'role' => $roles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPeriksa(Request $request)
    {
        if (auth()->user()->hasAnyRole(['admin'])) {
            // $request->validate([
            //     // 'tanggal' => ['required', 'max:50'],
            //     'tanggal' => ['required', 'max:50'],
            //     'idKandang' => ['required', 'max:50'],
            //     'mati' => ['required', 'max:50'],
            //     'culling' => ['required', 'max:50'],
            //     'bobot' => ['required', 'max:50'],
            //     'pakan' => ['required', 'max:50'],
            // ]);

            $addPeriksa = new Periksa;
            // $role = Role::findOrFail($request->peran);
            $addPeriksa->idPerusahaan = $request->idPerusahaan;
            $addPeriksa->idKandang = $request->idKandang;
            $addPeriksa->tglPeriksa = $request->tgl;
            $addPeriksa->mati = $request->mati;
            $addPeriksa->culling = $request->culling;
            $addPeriksa->bobot = $request->bobot;
            $addPeriksa->pakan = $request->pakan;

            // $addMember->email_verified_at = now();
            // $addMember->password = Hash::make('password');
            // $addMember->remember_token = Str::random(10);
            $addPeriksa->save();
            // $addMember->assignRole($role);
            Alert::success('Success', 'Data berhasil ditambahkan');
            return back();
        }
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Periksa  $periksa
     * @return \Illuminate\Http\Response
     */
    public function show(Periksa $periksa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Periksa  $periksa
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        // $role = Role::where('id', $request->peran)->first();
        $periksa = Periksa::where('id', $id)->first();

        if (auth()->user()->hasAnyRole(['admin'])) {
            $periksa->idPerusahaan = $request->idPerusahaan;
            $periksa->idKandang = $request->idKandang;
            $periksa->tglPeriksa = $request->tgl;
            $periksa->mati = $request->mati;
            $periksa->culling = $request->culling;
            $periksa->bobot = $request->bobot;
            $periksa->pakan = $request->pakan;
            // $member->firstname = $request->namaDepan;
            // $member->lastname = $request->namaBelakang;
            // $member->email = $request->email;
            $periksa->update();
            // $addPeriksa->syncRoles($role);
            Alert::success('Success', 'Data berhasil diubah');
            return redirect()->back();
        }
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Periksa  $periksa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Periksa $periksa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Periksa  $periksa
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if (auth()->user()->hasAnyRole(['admin'])) {
            $delete = Periksa::destroy($id);

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
