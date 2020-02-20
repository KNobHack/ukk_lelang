<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
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
        // Hanya admin yang bisa melihat users
        if (Auth::user()->is_admin) {
            $users = User::all();
            return view('user.index', ['users' => $users]);
        } else {
            return redirect(url('/u/' . Auth::user()->id));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Auth::logout();
        return redirect(url('/register'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Auth::logout();
        return redirect(url('/register'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Auth::user()->is_admin) {
            $id = Auth::user()->id;
        }
        $user = User::find($id);
        return view('user.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth::user()->is_admin) {
            $id = Auth::user()->id;
        }
        $user = User::find($id);
        return view('user.edit', ['user' => $user]);
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
        $request->validate([
            'nama_lengkap' => 'required|max:255',
            'no_telp' => 'required|digits_between:1,13'
        ]);

        if (!Auth::user()->is_admin) {
            $id = Auth::user()->id;
        }

        User::where('id', $id)
            ->update([
                'nama_lengkap' => $request->nama_lengkap,
                'no_telp' => $request->no_telp
            ]);

        return redirect(url('/u/' . $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->is_admin) {
            $id = Auth::user()->id;
            Auth::logout();
            User::destroy($id);
            return redirect(url('/'));
        } else {
            User::destroy($id);
            return redirect(url('/u'));
        }
    }

    public function promote($id)
    {
        if (Auth::user()->is_admin) {
            User::where('id', $id)->update(['is_admin' => true]);
            return redirect(url('/u'));
        } else {
            return redirect(url('/home'));
        }
    }

    public function demote($id)
    {
        if (Auth::user()->is_admin) {
            User::where('id', $id)->update(['is_admin' => false]);
            return redirect(url('/u'));
        } else {
            return redirect(url('/home'));
        }
    }
}
