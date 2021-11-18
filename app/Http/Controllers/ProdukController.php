<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
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
        return view('produk.produk');
    }

    public function ajax(Request $request)
    {
        if ($request->ajax()) {
            $data = Produk::with('kategori')->get();
            return Datatables::of($data)->addColumn('kategori', function ($data) {
                return $data->kategori->nama_kategori;
            })->addColumn('gambar_produk_file', function ($data) {
                $url= asset($data->gambar_produk);
                return '<img data-enlargeable width="100" style="cursor: zoom-in" src="'.$url.'" />';
            })->addColumn('action', function ($data) {
                return '<a href="data-produk-edit/' . $data->id . '" class="btn btn-sm btn-primary mr-2" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fas fa-edit"></i></a>
                <a data-toggle="modal" data-target="#modalhapusproduk" data-id="' . $data->id . '" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>';
            })->rawColumns(['gambar_produk_file', 'action'])->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::get();
        return view('produk.produk-add', compact('kategori'));
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
            'id_kategori' => 'required',
            'nama_produk' => 'required',
            'deskripsi_produk' => 'required',
            'stock' => 'required',
            'file' => 'required|mimes:jpg,png',
        ]);

        $produk = new Produk;
        if ($request->file()) {
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

            $produk->id_kategori = $request->id_kategori;
            $produk->nama_produk = $request->nama_produk;
            $produk->deskripsi_produk = $request->deskripsi_produk;
            $produk->stock = $request->stock;
            $produk->gambar_produk = 'storage/' . $filePath;
            $produk->save();

            return redirect('master/data-produk');
        }
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
        if($request->file){
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
            $request->merge(['gambar_produk' => 'storage/'.$filePath]);
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
        $produk->delete();
        return back();
    }
}
