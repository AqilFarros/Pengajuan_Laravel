<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $pengajuan = Pengajuan::latest()->get();

        return view('admin.index', compact('pengajuan'));
    }

    public function status($id)
    {
        try {
            $pengajuan = Pengajuan::findOrFail($id);

            $pengajuan->update([
                "status" => true
            ]);

            return redirect()->route('admin.index');
        } catch (\Throwable $th) {
            return redirect()->route('user.index');
        }
    }

    public function reply(Request $request, $id)
    {
        try {
            $pengajuan = Pengajuan::findOrFail($id);

            $pengajuan->update([
                "status" => true,
                "reply" => $request->reply
            ]);

            return redirect()->route('admin.index');
        } catch (\Throwable $th) {
            return redirect()->route('user.index');
        }
    }

    public function delete($id)
    {
        try {
            $pengajuan = Pengajuan::findOrFail($id);

            $pengajuan->delete();

            return redirect()->route('admin.index');
        } catch (\Throwable $th) {
            return redirect()->route('user.index');
        }
    }
}
