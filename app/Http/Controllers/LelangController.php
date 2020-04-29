<?php

namespace App\Http\Controllers;

use App\Asset;
use App\Lelang;
use App\Lelang_log;
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
        $lelang = Lelang::where(['status' => 1])->get();

        return view('lelang.index', ['lelang' => $lelang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Asset $assset
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
     * @param  \App\Asset $asset
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Asset $asset)
    {
        $lelang = new Lelang;

        if ($asset->user->id != Auth::user()->id) {
            redirect()->route('assets.index');
        }

        $request->validate([
            'harga_awal' => 'required|integer|min:1',
            'waktu_berakhir' => 'required|date|after:now',
        ]);

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
     * @param  \App\Lelang  $lelang
     * @return \Illuminate\Http\Response
     */
    public function show(Lelang $lelang)
    {
        return view('lelang.show', ['lelang' => $lelang]);
    }

    /**
     * Mulai menawar lelang
     *
     * @param  \App\Lelang  $lelang
     * @return \Illuminate\Http\Response
     */
    public function tawar(Lelang $lelang)
    {
        return view('lelang.tawar', ['lelang' => $lelang]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lelang  $lelang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lelang $lelang)
    {
        $request->validate([
            'harga_tawaran' => 'required|integer|min:' . $lelang->harga_sekarang,
        ]);

        $lelang_log = new Lelang_log([
            'user_id' => Auth::user()->id,
            'harga' => $request->harga_tawaran,
        ]);

        $lelang->harga_sekarang = $request->harga_tawaran;
        $lelang->save();
        $lelang->logs()->save($lelang_log);

        return redirect()->action('LelangController@show', [$lelang->id]);
    }

    /**
     * Akhiri lelang spesifik.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function akhiri(Lelang $lelang)
    {
        $lelang->status = false;
        $lelang->save();

        return redirect()->action('AssetController@index');
    }
}
