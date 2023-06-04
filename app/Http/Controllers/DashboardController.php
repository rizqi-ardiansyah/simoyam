<?php

namespace App\Http\Controllers;

use App\Models\Kandang;
use Illuminate\Http\Request;
use App\Models\Periksa;
use App\Models\User;
use App\Models\Vaksinasi;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getAyam = Kandang::sum('jmlAyam');
        $getCulling = Periksa::sum('culling');
        $getMati = Periksa::sum('mati');
        $getPanen = $getAyam - $getCulling - $getMati;
        $getPakan = Periksa::sum('pakan');
        $getVaksinasi = Vaksinasi::orderBy('id','desc')->first();
        $maxValue = $getVaksinasi->status;
        // $ttlAyam = $getRP->count();

        return view('admin.dashboard.index', [
           'ttlAyam' => $getAyam,
           'ttlCulling' => $getCulling,
           'ttlMati' => $getMati,
           'ttlPanen' => $getPanen,
           'ttlPakan' => $getPakan,
           'getPeriode' => $maxValue
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    function login(Request $req)
    {
        return User::where('email', $req->input('email'));
    }
}
