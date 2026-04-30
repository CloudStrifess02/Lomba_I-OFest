<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Toko;
use App\Models\KategoriToko;

class MarketplaceController extends Controller
{
    public function index(Request $request)
    {
        $query = Toko::with(['kategori', 'produk'])
            ->whereHas('kategori', function ($q) {
                $q->where('nama_kategori', 'Jasa Servis');
            });

            if ($request->search) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('nama_toko', 'like', "%$search%")
                    ->orWhere('kota', 'like', "%$search%") // 🔥 TAMBAH INI
                    ->orWhereHas('produk', function ($q2) use ($search) {
                        $q2->where('nama_produk', 'like', "%$search%")
                            ->orWhere('deskripsi_singkat', 'like', "%$search%");
                    });
            });
        }

        if ($request->kota) {
            $query->where('kota', $request->kota);
        }

        $toko = $query->get();
        $kotaList = Toko::select('kota')->distinct()->pluck('kota');

        if ($request->ajax()) {
            $html = view('user.marketplace.store_cards', compact('toko'))->render();

            return response()->json([
                'html' => $html,
                'count' => $toko->count()
            ]);
        }

        return view('user.marketplace.index', compact('toko', 'kotaList'));
    }

    public function show($id)
    {
        $toko = Toko::with(['kategori', 'produk'])->findOrFail($id);

        return view('user.marketplace.detail', compact('toko'));
    }
}
