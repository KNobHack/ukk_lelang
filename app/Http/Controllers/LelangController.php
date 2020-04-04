<?php

namespace App\Http\Controllers;

use App\Asset;
use App\Lelang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LelangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Asset $asset)
    {
        // filter id nya
        if ($asset->user->id != Auth::user()->id) {
            redirect()->route('assets.index');
        }

        return view('lelang.create', ['asset' => $asset]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Asset $asset)
    {
        $lelang = new Lelang;

        if ($asset->user->id != Auth::user()->id) {
            redirect()->route('assets.index');
        }

        // Jangan lupa validasi

        $lelang->user_id = Auth::user()->id;
        $lelang->asset_id = $asset->id;
        $lelang->harga_awal = $request->harga_awal;
        $lelang->harga_sekarang = $request->harga_awal;
        $lelang->waktu_berakhir = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->waktu_berakhir)));
        $lelang->status = 1;

        $lelang->save();

        return redirect()->route('assets.index');
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
}
