<?php

namespace App\Http\Controllers;

use App\Models\laporan;
use App\Models\Periksa;
use App\Models\Kandang;
use App\Models\Vaksinasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;
use PDF;
// use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periksa = Periksa::select('periksa.id as idPeriksa','periksa.idPerusahaan','kd.id as idKandang',
        'kd.noKandang','tglPeriksa','mati','culling','bobot','pakan','vk.id as idVaksinasi','vk.status as stVaksinasi',
        'vk.idKandang as idKan', 'pr.nama as namaPerusahaan')
            ->leftJoin('perusahaan as pr', 'periksa.idPerusahaan', '=', 'pr.idPerusahaan')
            ->leftJoin('kandang as kd','periksa.idKandang','=','kd.id')
            ->leftJoin('vaksinasi as vk','periksa.idKandang','=','vk.idKandang')
            // ->where('idPerusahaan','P0001')
            // ->orderBy('fullName', 'asc')
            ->paginate(10);

        $kandang = Kandang::all();

        $roles = Role::all();
        return view('admin.laporan.index', [
            'kandang' => $kandang,
            'data' => $periksa,
            'role' => $roles,
        ]);
    }

    // public function exportPdf(){
    //     $pdf = PDF::loadview('datapokphand-pdf');
    //     return $pdf->download('datapokphand.pdf');
    // }

    // public function printReview()
    //   {
    //     $periksa = Periksa::select('periksa.id as idPeriksa','periksa.idPerusahaan','kd.id as idKandang',
    //     'kd.noKandang','tglPeriksa','mati','culling','bobot','pakan','vk.id as idVaksinasi','vk.status as stVaksinasi',
    //     'vk.idKandang as idKan', 'pr.nama as namaPerusahaan')
    //         ->leftJoin('perusahaan as pr', 'periksa.idPerusahaan', '=', 'pr.idPerusahaan')
    //         ->leftJoin('kandang as kd','periksa.idKandang','=','kd.id')
    //         ->leftJoin('vaksinasi as vk','periksa.idKandang','=','vk.idKandang')
    //         // ->where('idPerusahaan','P0001')
    //         // ->orderBy('fullName', 'asc')
    //         ->paginate(5);

    //     $kandang = Kandang::all();

    //     $roles = Role::all();
    //     return view('admin.laporan.index', [
    //         'kandang' => $kandang,
    //         'data' => $periksa,
    //         'role' => $roles,
    //     ]);
    //   }

    public function filter(Request $request){
        $start_date = $request->fromDate;
        $end_date = $request->toDate;

        // $periksa = Periksa::whereDate('created_at','>=',$start_date)
        //                     ->whereDate('created_at','<=',$end_date)
        //                     ->paginate(5);
                            
        $periksa = Periksa::select('periksa.id as idPeriksa','periksa.idPerusahaan','kd.id as idKandang',
        'kd.noKandang','tglPeriksa','mati','culling','bobot','pakan','vk.id as idVaksinasi','vk.status as stVaksinasi',
        'vk.idKandang as idKan', 'pr.nama as namaPerusahaan','tglPeriksa')
            ->leftJoin('perusahaan as pr', 'periksa.idPerusahaan', '=', 'pr.idPerusahaan')
            ->leftJoin('kandang as kd','periksa.idKandang','=','kd.id')
            ->leftJoin('vaksinasi as vk','periksa.idKandang','=','vk.idKandang')
            ->whereDate('tglPeriksa','>=',$start_date)
                ->whereDate('tglPeriksa','<=',$end_date)
            // ->orderBy('fullName', 'asc')
            ->paginate(10);
        
            $kandang = Kandang::all();

            $roles = Role::all();

        // return view('admin.laporan.index',compact('data'));
        return view('admin.laporan.index', [
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
     * @param  \App\Models\laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function show(laporan $laporan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function edit(laporan $laporan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, laporan $laporan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function destroy(laporan $laporan)
    {
        //
    }
}
