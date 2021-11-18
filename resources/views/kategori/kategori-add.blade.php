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
            <a href="data-kategori" class="btn btn-primary pull-right"> <span class="fa fa-arrow-left"></span> Kembali</a>
        </div>
    </div>

    <form action="{{ route('add-master-kategori-process') }}" method="post">
        {{ csrf_field() }}
        <div class="modal-body">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="nama_kategori">Nama Kategori : *</label>
                        <input type="text" class="form-control" required name="nama_kategori" id="nama_kategori" minlength="3">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi : *</label>
                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" required class="form-control"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
@endsection
