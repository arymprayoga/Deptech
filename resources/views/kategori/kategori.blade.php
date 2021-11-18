@extends('layouts.app-new')

@section('content')
    <div class="card mt-2">
        <div class="card-header">
            <h2 class="card-title">Kategori</h2>
            <a href="data-kategori-add"><button type="button" class="btn btn-info btn-sm" style="float: right;">Buat
                    Baru</button></a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped" id="kategori-table" width="100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <div class="modal fade" id="modalhapuskategori" tabindex="-1" role="dialog" aria-labelledby="modalhapuskategoriLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalhapuskategoriLabel">Hapus Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('delete-master-kategori-process') }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" id="id">
                    <div class="modal-body">
                        <p>Yakin ingin menghapus kategori ini?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
