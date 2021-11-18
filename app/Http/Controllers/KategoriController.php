<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Kategori;
use Illuminate\Support\Facades\Hash;

class KategoriController extends Controller
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
        return view('kategori.kategori');
    }

    public function ajax(Request $request)
    {
        if ($request->ajax()) {
            $data = Kategori::all();
            return Datatables::of($data)->addColumn('action', function ($data) {
                return '<a href="data-kategori-edit/' . $data->id . '" class="btn btn-sm btn-primary mr-2" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fas fa-edit"></i></a>
                <a data-toggle="modal" data-target="#modalhapuskategori" data-id="' . $data->id . '" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>';
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
        return view('kategori.kategori-add');
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
            'nama_kategori' => 'required|min:3|unique:kategori',
            'deskripsi' => 'required|min:3',
        ]);
        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect('master/data-kategori');
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
        $kategori = Kategori::findOrFail($id);
        return view('kategori.kategori-edit', compact('kategori'));
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
            'nama_kategori' => 'required|min:3',
            'deskripsi' => 'required|min:3',
        ]);
        $kategori = Kategori::findOrFail($id);
        $kategori->update($request->all());
        return redirect('master/data-kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $kategori = Kategori::findOrFail($request->id);
        $kategori->delete();
        return back();
    }
}
