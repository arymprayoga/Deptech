<script src="{{ asset('js/app.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.0/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.select2').select2({
            theme: "bootstrap4",
            placeholder: "Silahkan Pilih",
            width: 'resolve'
        });
    });
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>

<script>
    $(document).ready(function() {
        dt = $('#user-table').DataTable({
            "processing": true,
            "serverSide": true,
            "columns": [{
                    "data": "id",
                    "name": "id",
                    "title": "#"
                },
                {
                    "data": "nama_depan",
                    "name": "nama_depan",
                    "title": "NAMA DEPAN"
                },
                {
                    "data": "nama_belakang",
                    "name": "nama_belakang",
                    "title": "NAMA BELAKANG"
                },
                {
                    "data": "email",
                    "name": "email",
                    "title": "EMAIL"
                },
                {
                    "data": "tanggal_lahir",
                    "name": "tanggal_lahir",
                    "title": "TANGGAL LAHIR"
                },
                {
                    "data": "jenis_kelamin",
                    "name": "jenis_kelamin",
                    "title": "JENIS KELAMIN"
                },
                {
                    "data": "action",
                    "name": "action",
                    "orderable": false,
                    "searchable": false
                },
            ],
            "ajax": "{{ url('master/data-user-get') }}",
        });
    });

    $(document).ready(function() {
        dt = $('#kategori-table').DataTable({
            "processing": true,
            "serverSide": true,
            "columns": [{
                    "data": "id",
                    "name": "id",
                    "title": "#"
                },
                {
                    "data": "nama_kategori",
                    "name": "nama_kategori",
                    "title": "NAMA KATEGORI"
                },
                {
                    "data": "deskripsi",
                    "name": "deskripsi",
                    "title": "DESKRIPSI"
                },
                {
                    "data": "action",
                    "name": "action",
                    "orderable": false,
                    "searchable": false
                },
            ],
            "ajax": "{{ url('master/data-kategori-get') }}",
        });
    });

    $(document).ready(function() {
        dt = $('#produk-table').DataTable({
            "processing": true,
            "serverSide": true,
            "columns": [{
                    "data": "id",
                    "name": "id",
                    "title": "#"
                },
                {
                    "data": "nama_produk",
                    "name": "nama_produk",
                    "title": "NAMA PRODUK"
                },
                {
                    "data": "kategori",
                    "name": "kategori",
                    "title": "KATEGORI PRODUK"
                },
                {
                    "data": "deskripsi_produk",
                    "name": "deskripsi_produk",
                    "title": "DESKRIPSI PRODUK"
                },
                {
                    "data": "gambar_produk_file",
                    "name": "gambar_produk_file",
                    "title": "GAMBAR PRODUK"
                },
                {
                    "data": "stock",
                    "name": "stock",
                    "title": "STOCK"
                },
                {
                    "data": "action",
                    "name": "action",
                    "orderable": false,
                    "searchable": false
                },
            ],
            "ajax": "{{ url('master/data-produk-get') }}",
        });
    });

    $(document).ready(function() {
        dt = $('#transaksi-table').DataTable({
            "processing": true,
            "serverSide": true,
            "columns": [{
                    "data": "id",
                    "name": "id",
                    "title": "#"
                },
                {
                    "data": "jenis_transaksi",
                    "name": "jenis_transaksi",
                    "title": "JENIS TRANSAKSI"
                },
                {
                    "data": "produk",
                    "name": "produk",
                    "title": "NAMA PRODUK"
                },
                {
                    "data": "jumlah",
                    "name": "jumlah",
                    "title": "JUMLAH TRANSAKSI"
                }
            ],
            "ajax": "{{ url('master/data-transaksi-get') }}",
        });
    });
</script>

<script>
    $('#modalhapususer').on('show.bs.modal', function(event) {
        var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
        var modal = $(this)
        // Isi nilai pada field
        modal.find('#id').attr("value", div.data('id'));
    });

    $('#modalhapuskategori').on('show.bs.modal', function(event) {
        var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
        var modal = $(this)
        // Isi nilai pada field
        modal.find('#id').attr("value", div.data('id'));
    });

    $('#modalhapusproduk').on('show.bs.modal', function(event) {
        var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
        var modal = $(this)
        // Isi nilai pada field
        modal.find('#id').attr("value", div.data('id'));
    });

    $('#modalhapustransaksi').on('show.bs.modal', function(event) {
        var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
        var modal = $(this)
        // Isi nilai pada field
        modal.find('#id').attr("value", div.data('id'));
    });
</script>
