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
            <a href="{{ route('data-user') }}" class="btn btn-primary pull-right">Kelola User</a>
        </div>
    </div>

    <form action="{{ route('edit-master-user-process', $user->id) }}" method="post">
        {{ csrf_field() }}
        <div class="modal-body">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="nama_depan">Nama Depan : *</label>
                        <input type="text" class="form-control" required name="nama_depan" id="nama_depan" minlength="3"
                        value="{{$user->nama_depan}}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="nama_belakang">Nama Belakang : *</label>
                        <input type="text" class="form-control" required name="nama_belakang" id="nama_belakang"
                            minlength="3" value="{{$user->nama_belakang}}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="email">Email : *</label>
                        <input type="email" class="form-control" name="email" id="email" required
                        value="{{$user->email}}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir : *</label>
                        <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" required
                        value="{{$user->tanggal_lahir}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin : *</label>
                        <select class="select2 form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                            <option value="Laki-Laki" @if ($user->jenis_kelamin == 'Laki-Laki')
                                selected
                                @endif>Laki-Laki</option>
                            <option value="Perempuan" @if ($user->jenis_kelamin == 'Perempuan')
                                selected
                                @endif>Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="password">Password : *</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
@endsection
