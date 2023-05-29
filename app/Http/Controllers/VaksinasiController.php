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
    public function create()
    {
        //
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
    public function edit(Vaksinasi $vaksinasi)
    {
        //
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
    public function destroy(Vaksinasi $vaksinasi)
    {
        //
    }
}
