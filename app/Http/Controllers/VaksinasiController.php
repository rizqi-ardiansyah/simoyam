<?php

namespace App\Http\Controllers;

use App\Models\Vaksinasi;
use App\Models\Kandang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class VaksinasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vaksinasi = Vaksinasi::select('vaksinasi.id as idVaksinasi','vaksinasi.idPerusahaan',
        'kd.id as idKandang','kd.noKandang','tglVaksinasi','jadwal','jenis','status')
            ->leftJoin('perusahaan as pr', 'vaksinasi.idPerusahaan', '=', 'pr.idPerusahaan')
            ->leftJoin('kandang as kd','vaksinasi.idKandang','=','kd.id')
            // ->where('idPerusahaan','P0001')
            // ->orderBy('fullName', 'asc')
            ->paginate(5);

        $kandang = Kandang::all();

        $roles = Role::all();
        return view('admin.vaksinasi.index', [
            'kandang' => $kandang,
            'data' => $vaksinasi,
            'role' => $roles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createVaksinasi(Request $request)
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

            $addVaksinasi = new Vaksinasi;
            // $role = Role::findOrFail($request->peran);
            $addVaksinasi->tglVaksinasi = $request->tglVaksinasi;
            $addVaksinasi->idPerusahaan = $request->idPerusahaan;
            $addVaksinasi->idKandang = $request->idKandang;
            $addVaksinasi->jenis = $request->jenis;
            $addVaksinasi->jadwal = $request->jadwal;
            $addVaksinasi->status = $request->status;

            $addVaksinasi->save();
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
     * @param  \App\Models\Vaksinasi  $vaksinasi
     * @return \Illuminate\Http\Response
     */
    public function show(Vaksinasi $vaksinasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vaksinasi  $vaksinasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //
        $vaksinasi = Vaksinasi::where('id', $id)->first();

        if (auth()->user()->hasAnyRole(['admin'])) {
            $vaksinasi->idPerusahaan = $request->idPerusahaan;
            $vaksinasi->idKandang = $request->idKandang;
            $vaksinasi->tglVaksinasi = $request->tglVaksinasi;
            $vaksinasi->jenis = $request->jenis;
            $vaksinasi->status = $request->status;
          
            // $member->firstname = $request->namaDepan;
            // $member->lastname = $request->namaBelakang;
            // $member->email = $request->email;
            $vaksinasi->update();
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
     * @param  \App\Models\Vaksinasi  $vaksinasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vaksinasi $vaksinasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vaksinasi  $vaksinasi
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if (auth()->user()->hasAnyRole(['admin'])) {
            $delete = Vaksinasi::destroy($id);

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
