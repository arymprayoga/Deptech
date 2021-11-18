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
            <a href="data-transaksi" class="btn btn-primary pull-right">Kembali</a>
        </div>
    </div>

    <form action="{{ route('add-master-transaksi-process') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="modal-body">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="id_produk">Produk : *</label>
                        <select class="select2 form-control" name="id_produk" id="id_produk" required>
                            @foreach ($produk as $item)
                                <option value="{{$item->id}}">{{$item->nama_produk}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="jenis_transaksi">Jenis Transaksi : *</label>
                        <select class="select2 form-control" name="jenis_transaksi" id="jenis_transaksi" required>
                            <option value="Masuk">Masuk</option>
                            <option value="Keluar">Keluar</option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="jumlah">Jumlah : *</label>
                        <input type="number" class="form-control" name="jumlah" id="jumlah" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
@endsection
