<?php

namespace App\Http\Controllers;

use App\Asset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Genre;

class AssetController extends Controller
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
        $assets = User::find(Auth::user()->id)->assets;
        return view('asset.index', compact('assets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::all();
        return view('asset.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'game' => 'required',
            'identifier' => 'required',
            'deskripsi' => 'required',
        ]);

        $asset = new Asset;

        $asset->user_id = Auth::user()->id;
        $asset->game = $request->game;
        $asset->identifier = $request->identifier;
        $asset->deskripsi = $request->deskripsi;

        $asset->save();

        // Relasi Asset dan genre
        $genres = Genre::all();
        foreach ($genres as $g) {
            if (isset($request->all()[$g->genre])) {
                $asset->genres()->attach($request->all()[$g->genre]);
            }
        }

        return redirect(url('/assets'))->with('pesan', 'Berhasil membuat asset');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asset = Asset::find($id);

        return view('asset.show');
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
        $asset = Asset::find($id);
        $asset->genres()->detach();
        $asset->delete();

        return redirect(url('/assets'))->with('pesan', 'Berhasil menghapus asset');
    }
}
