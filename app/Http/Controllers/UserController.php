<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $pengajuan = Pengajuan::latest()->get();

        return view('user.index', compact('pengajuan'));
    }

    public function store(Request $request) {
        $request->validate([
            'pengajuan' => 'required',
            'level' => 'required'
        ]);

        Pengajuan::create([
            'pengajuan' => $request->pengajuan,
            'level' => $request->level
        ]);

        return redirect()->route('user.index');
    }
}
