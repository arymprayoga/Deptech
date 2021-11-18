@extends('layouts.app-new')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-12 text-right">
            <a href="data-produk" class="btn btn-primary pull-right">Kembali</a>
        </div>
    </div>

    <form action="{{ route('add-master-produk-process') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="modal-body">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="nama_produk">Nama Produk : *</label>
                        <input type="text" class="form-control" required name="nama_produk" id="nama_produk" minlength="3">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="id_kategori">Kategori : *</label>
                        <select class="select2 form-control" name="id_kategori" id="id_kategori" required>
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="deskripsi_produk">Deskripsi Produk : *</label>
                        <input type="text" class="form-control" required name="deskripsi_produk" id="deskripsi_produk"
                            minlength="3">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="stock">Stock : *</label>
                        <input type="number" class="form-control" name="stock" id="stock" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="file">Gambar Produk : *</label>
                        <input type="file" class="form-control" name="file" id="file" required accept="image/x-png, image/jpeg">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
@endsection
