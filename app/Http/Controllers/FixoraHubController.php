<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Toko;

class FixoraHubController extends Controller
{
    public function index(Request $request)
    {
        $query = Toko::with(['kategori', 'produk'])
            ->whereHas('kategori', function ($q) {
                $q->where('nama_kategori', 'Pengepul Resmi');
            });

        if ($request->search) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('nama_toko', 'like', "%$search%")
                    ->orWhere('alamat', 'like', "%$search%")
                    ->orWhere('kota', 'like', "%$search%"); // 🔥 TAMBAH INI
            });
        }

        if ($request->kota) {
            $query->where('kota', $request->kota);
        }

        $toko = $query->get();

        $kotaList = Toko::whereHas('kategori', function ($q) {
            $q->where('nama_kategori', 'Pengepul Resmi');
        })
            ->select('kota')
            ->distinct()
            ->pluck('kota');

        if ($request->ajax()) {
            $html = view('user.fixora_hub.cards', compact('toko'))->render();

            return response()->json([
                'html' => $html,
                'count' => $toko->count()
            ]);
        }

        return view('user.fixora_hub.index', compact('toko', 'kotaList'));
    }
}
