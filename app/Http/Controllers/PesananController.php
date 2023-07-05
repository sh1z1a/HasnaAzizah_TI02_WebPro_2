<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //query builder

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //query builder
        $pesanan = DB::table('pesanan')
        ->join('produk', 'pesanan.produk_id', '=', 'produk.id')
        ->select('pesanan.*', 'produk.nama as nama_produk')
        ->get();

        //kembalikan ke halaman view
        return view('admin.pesanan.index', compact('pesanan'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //ini sintaks eloquent
        $pesanan = DB::table('pesanan')->get();

        return view('pesanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //eloquent
        $pesanan = new Pesanan;
        $pesanan->nama = $request->nama;
        $pesanan->save();

        return redirect('pesanan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $pesanan = DB::table('pesanan')->where('id', $id)->get();

        return view('admin.pesanan.edit', compact('kategori_produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
