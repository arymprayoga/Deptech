<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Storage;

class TransaksiController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        return view('transaksi.transaksi');
    }

    public function ajax(Request $request)
    {
        if ($request->ajax()) {
            $data = Transaksi::with('produk')->get();
            return Datatables::of($data)->addColumn('produk', function ($data) {
                return $data->produk->nama_produk;
            })->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk = Produk::get();
        return view('transaksi.transaksi-add', compact('produk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_produk' => 'required',
            'jenis_transaksi' => 'required',
            'jumlah' => 'required',
        ]);
        $produk = Produk::find($request->id_produk);
        $check = false;
        if ($request->jenis_transaksi == 'Masuk') {
            $produk->stock += $request->jumlah;
            $produk->save();
            $check = true;
        } else if ($request->jenis_transaksi == 'Keluar') {
            if ($produk->stock >= $request->jumlah) {
                $check = true;
                $produk->stock -= $request->jumlah;
                $produk->save();
            }
        }

        if($check){
            Transaksi::create([
                'id_produk' => $request->id_produk,
                'jenis_transaksi' => $request->jenis_transaksi,
                'jumlah' => $request->jumlah
            ]);
        }
        
        return redirect('master/data-transaksi');
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
        $kategori = Kategori::get();
        $produk = Produk::findOrFail($id);
        return view('produk.produk-edit', compact('produk', 'kategori'));
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
        $validated = $request->validate([
            'id_kategori' => 'required',
            'nama_produk' => 'required',
            'deskripsi_produk' => 'required',
            'stock' => 'required',
        ]);
        if ($request->file) {
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
            $request->merge(['gambar_produk' => 'storage/' . $filePath]);
        }
        $produk = Produk::findOrFail($id);
        $produk->update($request->all());
        return redirect('master/data-produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $produk = Produk::findOrFail($request->id);
        Storage::delete($produk->gambar_produk);
        // $produk->delete();
        return back();
    }
}
