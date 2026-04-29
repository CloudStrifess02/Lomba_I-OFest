<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Toko;
use App\Models\KategoriToko;

class MarketplaceController extends Controller
{
    public function index(Request $request)
    {
        $query = Toko::with(['kategori', 'produk']);

        if ($request->search) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('nama_toko', 'like', '%' . $search . '%')
                    ->orWhereHas('produk', function ($q2) use ($search) {
                        $q2->where('nama_produk', 'like', '%' . $search . '%')
                            ->orWhere('deskripsi_singkat', 'like', '%' . $search . '%');
                    });
            });
        }
        
        if ($request->category && $request->category != 'all') {
            $query->where('kategori_toko_id', $request->category);
        }

        $stores = $query->get();
        $categories = KategoriToko::all();


        // Jika request dari AJAX (saat filter berjalan)
        if ($request->ajax()) {
            $html = view('user.store_cards', compact('stores'))->render();

            return response()->json([
                'html' => $html,
                'count' => $stores->count()
            ]);
        }

        // Render pertama kali
        return view('user.marketplace', compact('stores', 'categories'));
    }
}
